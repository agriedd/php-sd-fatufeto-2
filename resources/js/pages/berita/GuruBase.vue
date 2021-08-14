<template>
    <div>
        <router-view/>
        <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/>
    </div>
</template>
<script>
import GuruHapus from './BeritaHapus.vue'
import GuruTambah from './BeritaTambah.vue'
import GuruUbah from './BeritaUbah.vue'
export default {
    components: { 
        GuruTambah, 
        GuruUbah, 
        GuruHapus 
    },
}
</script>