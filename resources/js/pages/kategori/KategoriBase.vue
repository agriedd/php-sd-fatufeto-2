<template>
    <div>
        <router-view/>
        <kategori-tambah/>
    </div>
</template>
<script>
import KategoriTambah from './KategoriTambah.vue'
export default {
    components: {
        KategoriTambah 
    },
}
</script>