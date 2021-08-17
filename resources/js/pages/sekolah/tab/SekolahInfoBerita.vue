<template>
    <v-card flat>
        <v-card-title id="visi-misi">
            Berita
        </v-card-title>
        <v-card-text>
            <v-card color="grey lighten-4" rounded="xl" flat>
                <berita-list-index :noSelect="true" :headers="headers" no-breadcrumb/>
            </v-card>
        </v-card-text>
    </v-card>
</template>
<script>
import BeritaListIndex from '../../berita/page/BeritaListIndex.vue'
export default {
  components: { BeritaListIndex },
    props: {
        item: Object
    },
    data () {
        return {
            headers: [
                { text: 'Judul', align: 'start', sortable: true, value: 'judul' },
                { text: 'jenis', align: 'end d-none d-sm-table-cell', sortable: true, value: 'jenis' },
            ]
        }
    },
}
</script>