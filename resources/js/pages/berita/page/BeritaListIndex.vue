<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <berita-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoBerita"
                @editRow="ubahInfoBerita"
                @deleteRow="hapusInfoBerita"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import BeritaTable from '../datatable/BeritaTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
        BeritaTable
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
                    text: 'Berita',
                    disabled: false,
                    to: {name: 'berita'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Berita',
                    disabled: true,
                },
            ],
            items: [],
            headers: [
                { text: null, align: 'center', sortable: false, value: 'foto' },
                { text: 'Nama', align: 'start', sortable: true, value: 'nama' },
                { text: 'Jenis Kelamin', align: 'start d-none d-sm-table-cell', sortable: true, value: 'jenis_kelamin' },
                { text: 'Pangkat', align: 'start d-none d-sm-table-cell', sortable: true, value: 'pangkat' },
                { text: 'Golongan', align: 'start d-none d-sm-table-cell', sortable: true, value: 'golongan' },
                { text: 'TTL', align: 'end d-none d-sm-table-cell', sortable: true, value: 'tanggal_lahir' },
                { text: null, align: '', sortable: true, value: 'action' },
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
            getItems: 'berita/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'berita/setModalUbah',
            showHapusDialog: 'berita/setModalHapus',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItems({...this.options, search: this.search, ...this.params }).catch(e => {});
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
            this.$emit('open:berita:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoBerita({id_berita: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoBerita({id_berita: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoBerita({id_berita}){
            this.$router.push({ name: 'berita.show', params: { id_berita } })
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