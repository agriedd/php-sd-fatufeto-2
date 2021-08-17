<template>
    <div>
        <router-view/>
        <kegiatan-tambah/>
        <!-- <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/> -->
    </div>
</template>
<script>
import KegiatanTambah from './KegiatanTambah.vue'
export default {
    components: { 
        KegiatanTambah
    },
}
</script>