<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <jadwal-list-index :headers="headers" :dayRange="2" :noBreadcrumbs="true" :noSelect="true"/>
    </v-card>
</template>
<script>
import JadwalListIndex from '../../jadwal/page/JadwalListIndex.vue'
export default {
    components: { JadwalListIndex },
    props: {
        item: Object
    },
    data(){
        return {
            headers: [
                { text: 'Mulai', align: 'start d-none d-sm-table-cell', sortable: true, value: 'waktu_mulai' },
                { text: 'Berakhir', align: 'start d-none d-sm-table-cell', sortable: true, value: 'waktu_berakhir' },
                { text: 'Mata Pelajaran', align: 'start', sortable: true, value: 'mata_pelajaran' },
                { text: 'Hari', align: 'start d-none d-sm-table-cell', sortable: true, value: 'hari' },
            ],
        }
    }
}
</script>