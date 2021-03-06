<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text class="d-flex">
                <v-text-field type="search" hide-details rounded dense placeholder="Temukan..." v-model="search"/>
            </v-card-text>
            <v-card-text class="d-flex">
                <input-hari-kegiatan @selected="filterByDay" :range="dayRange"/>
            </v-card-text>
            <kegiatan-table
                :headers="headers"
                :items="items"
                :options="options"
                :total="total"
                :loading="loading"
                v-model="selected"
                @update:options="options = $event"
                @update="update"
                @rowClick="toInfoKegiatan"
                @editRow="ubahInfoKegiatan"
                @deleteRow="hapusInfoKegiatan"
                :small="small"
                :no-select="noSelect"/>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import moment from 'moment'
import { mapActions } from 'vuex'
import KegiatanTable from '../datatable/KegiatanTable.vue'
import InputHariKegiatan from '../form/InputHariKegiatan.vue'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
        dayRange: Number,
        hari_default: {
            type: String,
            default: ()=>{
                return moment().locale('id-ID').format('dddd').toLowerCase()
            }
        },
        date_default: {
            type: String,
            default: ()=>{
                return Date.now()
            }
        }

    },
    components: {
        KegiatanTable,
        InputHariKegiatan
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
                { text: 'Nama Kegiatan', align: 'start', sortable: true, value: 'nama_kegiatan' },
                { text: 'Lokasi', align: 'start d-none d-sm-table-cell', sortable: true, value: 'lokasi' },
                { text: 'Tanggal', align: 'start d-none d-sm-table-cell', sortable: true, value: 'tanggal' },
                { text: 'Waktu', align: 'end d-none d-sm-table-cell', sortable: true, value: 'waktu' },
                { text: 'Hari', align: 'end d-none d-sm-table-cell', sortable: true, value: 'hari' },
                { text: null, align: '', sortable: true, value: 'action' },
            ],
            options: {
                page: 1,
                itemsPerPage: 10,
                sortBy: ['tanggal', 'waktu'],
                sortDesc: [true, true],
                groupBy: [],
                groupDesc: [],
                mustSort: false,
                multiSort: false,
                hari: this.hari_default,
                date: this.date_default,
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
            getItems: 'kegiatan/get',
            notif: 'notifikasi/show',
            showUbahDialog: 'kegiatan/setModalUbah',
            showHapusDialog: 'kegiatan/setModalHapus',
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
            this.$emit('open:kegiatan:info', e)
        },
        editRow(e){

        },
        clickEvent(t, d){
            this.$emit(t, d)
        },
        ubahInfoKegiatan({id_kegiatan: id}){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoKegiatan({id_kegiatan: id}){
            this.showHapusDialog({id, value: true})
        },
        toInfoKegiatan({id_kegiatan}){
            this.$router.push({ name: 'kegiatan.show', params: { id_kegiatan } })
        },
        filterByDay({ day, date }){
            this.options.hari = day.toLowerCase()
            this.options.date = moment(date).format('YYYY-MM-DD')
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