<template>
    <div>
        <router-view/>
        <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/>
    </div>
</template>
<script>
import GuruHapus from './KategoriHapus.vue'
import GuruTambah from './KategoriTambah.vue'
import GuruUbah from './KategoriUbah.vue'
export default {
    components: { 
        GuruTambah, 
        GuruUbah, 
        GuruHapus 
    },
}
</script>