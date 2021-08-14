<template>
    <div>
        <router-view/>
        <berita-tambah/>
        <!-- <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/> -->
    </div>
</template>
<script>
import BeritaTambah from './BeritaTambah.vue'
export default {
    components: {
        BeritaTambah 
    },
}
</script>