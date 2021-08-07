<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm" v-if="!noBreadcrumbs">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <input-pilih-hari-jadwal-grid @selected="filterByDay" :range="dayRange"/>
                <!-- <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/> -->
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
        <v-btn fab bottom fixed right color="indigo" class="mr-4" dark @click="openModalTambah">
            <v-icon>mdi-plus</v-icon>
        </v-btn>
    </div>
</template>
<script>
import { mapActions, mapMutations } from 'vuex'
import JadwalTable from '../datatable/JadwalTable.vue'
import InputPilihHariJadwalGrid from '../form/InputPilihHariJadwalGrid.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
        noBreadcrumbs: Boolean,
        dayRange: Number,
        headers: {
            default(){
                return [
                    { text: 'Mulai', align: 'start d-none d-sm-table-cell', sortable: true, value: 'waktu_mulai' },
                    { text: 'Berakhir', align: 'start d-none d-sm-table-cell', sortable: true, value: 'waktu_berakhir' },
                    // { text: null, align: 'center', sortable: false, value: 'foto' },
                    { text: 'Mata Pelajaran', align: 'start', sortable: true, value: 'mata_pelajaran' },
                    { text: 'Kelas', align: 'start', sortable: true, value: 'id_kelas' },
                    { text: 'Hari', align: 'start d-none d-sm-table-cell', sortable: true, value: 'hari' },
                    { text: null, align: '', sortable: true, value: 'action' },
                ]
            }
        }
    },
    components: {
        JadwalTable,
        InputPilihHariJadwalGrid
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
            options: {
                page: 1,
                itemsPerPage: 10,
                sortBy: ['waktu_mulai'],
                sortDesc: [false],
                groupBy: [],
                groupDesc: [],
                mustSort: false,
                multiSort: false,
                hari: null,
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
        ...mapMutations({
            showTambahDialog: 'jadwal/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            getItems: 'jadwal/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'jadwal/setModalUbah',
            showHapusDialog: 'jadwal/setModalHapus',
            getItem: 'kelas/show',
        }),
        async loadItems(){
            this.loading = true
            let res = await this.getItems({...this.options, search: this.search, ...this.params, id_kelas: this.$route.params.id_kelas }).catch(e => {});
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
        ubahInfoJadwal({id_jadwal: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoJadwal({id_jadwal: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoJadwal({id_jadwal}){
            this.$router.push({ name: 'jadwal.show', params: { id_jadwal } })
        },
        filterByDay(val){
            this.options.hari = val.toLowerCase()
        },        
        openModalTambah(){
            this.showTambahDialog(true)
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