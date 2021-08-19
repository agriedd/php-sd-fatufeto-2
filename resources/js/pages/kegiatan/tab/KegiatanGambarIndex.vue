<template>
    <v-card flat>
        <v-card-title id="visi-misi">
            Gambar Kegiatan
        </v-card-title>
        <v-card-text>
            <v-card color="grey lighten-4" rounded="xl" flat>
                <gambar-kegiatan-list-index :noSelect="true" :headers="headers" no-breadcrumb/>
            </v-card>
        </v-card-text>
    </v-card>
</template>
<script>
import GambarKegiatanListIndex from '../../gambarkegiatan/page/GambarKegiatanListIndex.vue'
export default {
    components: { GambarKegiatanListIndex },
    props: {
        item: Object
    },
    data () {
        return {
            headers: [
                { text: 'Gambar', align: 'start', sortable: true, value: 'foto' },
                { text: null, align: 'end', sortable: true, value: 'aksi' },
                // { text: '', align: 'end d-none d-sm-table-cell', sortable: true, value: 'aksi' },
            ]
        }
    },
}
</script>