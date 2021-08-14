<template>
    <div>
        <router-view/>
        <berita-tambah/>
        <berita-ubah/>
        <!-- <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/> -->
    </div>
</template>
<script>
import BeritaTambah from './BeritaTambah.vue'
import BeritaUbah from './BeritaUbah.vue'
export default {
    components: {
        BeritaTambah,
        BeritaUbah 
    },
}
</script>