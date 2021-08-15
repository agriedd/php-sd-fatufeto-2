<template>
    <div>
        <router-view/>
        <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/>
    </div>
</template>
<script>
import GuruHapus from './KegiatanHapus.vue'
import GuruTambah from './KegiatanTambah.vue'
import GuruUbah from './KegiatanUbah.vue'
export default {
    components: { 
        GuruTambah, 
        GuruUbah, 
        GuruHapus 
    },
}
</script>