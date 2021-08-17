<template>
    <div>
        <router-view/>
        <kategori-tambah/>
        <kategori-ubah/>
    </div>
</template>
<script>
import KategoriTambah from './KategoriTambah.vue'
import KategoriUbah from './KategoriUbah.vue'
export default {
    components: {
        KategoriTambah,
        KategoriUbah 
    },
}
</script>