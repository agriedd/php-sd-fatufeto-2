<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm" v-if="!noBreadcrumb">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <gambar-kegiatan-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @deleteRow="hapusInfoKegiatan"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import GambarKegiatanTable from '../datatable/GambarKegiatanTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
        noBreadcrumb: Boolean
    },
    components: {
        GambarKegiatanTable
    },
    data(){
        return {
            breadcrumb: [
                {
                    text: 'Panel Admin',
                    disabled: false,
                    to: {name: 'admin'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Kegiatan',
                    disabled: false,
                    to: {name: 'kegiatan'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Kegiatan',
                    disabled: true,
                },
            ],
            items: [],
            headers: [
                { text: null, align: 'center', sortable: false, value: 'foto' },
                { text: "Tanggal Dibuat", align: '', sortable: true, value: 'created_at' },
            ],
            options: {
                page: 1,
                itemsPerPage: 10,
                sortBy: ['created_at'],
                sortDesc: [true],
                groupBy: [],
                groupDesc: [],
                mustSort: false,
                multiSort: false,
            },
            selected: [],
            total: 0,
            search: '',
            loading: false,
            view: 'table',
            snackbar: {
                status: true,
                message: "Error!",
            },
            lazyTransition: null,
        }
    },
    computed: {
    },
    methods: {
        ...mapActions({
            getItems: 'kegiatan/gambar/get',
            notif: 'notifikasi/show',
            showHapusDialog: 'kegiatan/gambar/setModalHapus',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItems({ id_kegiatan: this.$route.params.id_kegiatan, params: {...this.options, search: this.search, ...this.params} }).catch(e => {});
            this.loading = false
            if(res){
                this.items = res.data.data
                let meta = res.data.meta
                this.options = {
                    ...this.options,
                    page: parseInt(meta.current_page),
                    itemsPerPage: parseInt(meta.per_page),
                    mustSort: false,
                    multiSort: false,
                }
                this.total = parseInt(meta.total)
            }
        },
        update(){
            this.loadItems()
        },
        lazy(callback){
            if(this.lazyTransition)
                clearTimeout(this.lazyTransition);
            this.lazyTransition = setTimeout(()=>{
                callback();
                this.lazyTransition = null;
            }, 800);
        },
        rowClick(e){
            this.$emit('open:kegiatan:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoKegiatan({id_gambar_kegiatan: id}){

        },
        hapusInfoKegiatan({id_gambar_kegiatan: id}){
            this.showHapusDialog({id, id_kegiatan: this.$route.id_kegiatan, value: true})
        },
    },
    watch: {
        search(val, old){
            if(val != old)
                this.lazy(_=>this.loadItems())
        },
        dataSession(val, old){
            this.update()
        }
    },
    created(){}
}
</script>