<template>
    <div>
        <router-view/>
        <kegiatan-tambah/>
        <kegiatan-ubah/>
    </div>
</template>
<script>
import KegiatanTambah from './KegiatanTambah.vue'
import KegiatanUbah from './KegiatanUbah.vue'
export default {
    components: { 
        KegiatanTambah,
        KegiatanUbah
    },
}
</script>