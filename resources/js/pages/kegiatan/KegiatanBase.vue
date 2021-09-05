<template>
    <div>
        <router-view/>
        <template v-if="!isPimpinan">
            <kegiatan-tambah/>
            <kegiatan-ubah/>
            <kegiatan-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import KegiatanHapus from './KegiatanHapus.vue'
import KegiatanTambah from './KegiatanTambah.vue'
import KegiatanUbah from './KegiatanUbah.vue'
export default {
    components: { 
        KegiatanTambah,
        KegiatanUbah,
        KegiatanHapus
    },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>