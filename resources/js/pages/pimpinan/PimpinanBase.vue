<template>
    <div>
        <router-view/>
        <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/>
    </div>
</template>
<script>
import GuruHapus from './PimpinanHapus.vue'
import GuruTambah from './PimpinanTambah.vue'
import GuruUbah from './PimpinanUbah.vue'
export default {
    components: { 
        GuruTambah, 
        GuruUbah, 
        GuruHapus 
    },
}
</script>