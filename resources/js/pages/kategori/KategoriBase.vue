<template>
    <div>
        <router-view/>
        <kategori-tambah/>
        <kategori-ubah/>
        <kategori-hapus/>
    </div>
</template>
<script>
import KategoriHapus from './KategoriHapus.vue'
import KategoriTambah from './KategoriTambah.vue'
import KategoriUbah from './KategoriUbah.vue'
export default {
    components: {
        KategoriTambah,
        KategoriUbah,
        KategoriHapus 
    },
}
</script>