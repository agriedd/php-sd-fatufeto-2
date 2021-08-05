<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <jadwal-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoJadwal"
                @editRow="ubahInfoJadwal"
                @deleteRow="hapusInfoJadwal"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import JadwalTable from '../datatable/JadwalTable.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
        JadwalTable
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
                    text: 'Jadwal',
                    disabled: false,
                    to: {name: 'jadwal'},
                    link: true,
                    exact: true,
                },
            ],
            items: [],
            headers: [
                { text: null, align: 'center', sortable: false, value: 'foto' },
                { text: 'Mata Pelajaran', align: 'start', sortable: true, value: 'mata_pelajaran' },
                { text: 'Kelas', align: 'start', sortable: true, value: 'id_kelas' },
                { text: 'Hari', align: 'start d-none d-sm-table-cell', sortable: true, value: 'hari' },
                { text: 'Mulai', align: 'start d-none d-sm-table-cell', sortable: true, value: 'start' },
                { text: 'Berakhir', align: 'start d-none d-sm-table-cell', sortable: true, value: 'end' },
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
            exists: false,
            item: {},
            ori: {},
        }
    },
    computed: {
    },
    methods: {
        ...mapActions({
            getItems: 'jadwal/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'jadwal/setModalUbah',
            showHapusDialog: 'jadwal/setModalHapus',
            getItem: 'kelas/show',
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
        async loadItem(){
            this.exists = false
            let res = await this.getItem({ id: this.$route.params.id_kelas }).catch(e => {
                console.log("loadItem@JadwalListIndex.vue", e);
                this.notif({
                    message: e.message
                })
            })
            if(res){
                this.exists = true
                for(let key in res.data.data){
                    this.$set(this.item, key, res.data.data[key])
                    this.$set(this.ori, key, res.data.data[key])
                }
                this.breadcrumb.push({
                    text: `List Jadwal ${this.item.nama}`,
                    disabled: true,
                })
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
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoJadwal({id_sarana: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoJadwal({id_sarana: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoJadwal({id_sarana}){
            this.$router.push({ name: 'jadwal.show', params: { id_sarana } })
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
    created(){
        this.loadItem()
    }
}
</script>