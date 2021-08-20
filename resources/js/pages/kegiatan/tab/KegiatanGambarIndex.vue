<template>
    <v-card flat>
        <v-card-title id="visi-misi">
            Gambar Kegiatan
        </v-card-title>
        <v-fab-transition>
            <v-btn fab bottom fixed right color="teal" dark :key="$route.name" @click="openModalTambah">
                <v-icon>mdi-image-plus</v-icon>
            </v-btn>
        </v-fab-transition>
        <v-card-text>
            <v-card color="grey lighten-4" rounded="xl" flat>
                <gambar-kegiatan-list-index :noSelect="true" :headers="headers" no-breadcrumb/>
            </v-card>
        </v-card-text>
        <gambar-kegiatan-tambah/>
        <gambar-kegiatan-hapus/>
    </v-card>
</template>
<script>
import { mapActions, mapMutations } from 'vuex'
import GambarKegiatanHapus from '../../gambarkegiatan/GambarKegiatanHapus.vue'
import GambarKegiatanTambah from '../../gambarkegiatan/GambarKegiatanTambah.vue'
import GambarKegiatanListIndex from '../../gambarkegiatan/page/GambarKegiatanListIndex.vue'
export default {
    components: { GambarKegiatanListIndex, GambarKegiatanTambah, GambarKegiatanHapus },
    props: {
        item: Object
    },
    data () {
        return {
            headers: [
                { text: 'Gambar', align: 'start', sortable: false, value: 'foto' },
                { text: "Tanggal", align: 'end', sortable: true, value: 'created_at' },
                // { text: '', align: 'end d-none d-sm-table-cell', sortable: true, value: 'aksi' },
            ]
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'kegiatan/gambar/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            showHapusDialog: 'kegiatan/gambar/setModalHapus',
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
    }
}
</script>