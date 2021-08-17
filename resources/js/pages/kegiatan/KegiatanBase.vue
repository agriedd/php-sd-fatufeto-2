<template>
    <div>
        <router-view/>
        <kegiatan-tambah/>
        <kegiatan-ubah/>
        <kegiatan-hapus/>
    </div>
</template>
<script>
import KegiatanHapus from './KegiatanHapus.vue'
import KegiatanTambah from './KegiatanTambah.vue'
import KegiatanUbah from './KegiatanUbah.vue'
export default {
    components: { 
        KegiatanTambah,
        KegiatanUbah,
        KegiatanHapus
    },
}
</script>