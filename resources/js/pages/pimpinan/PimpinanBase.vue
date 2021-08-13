<template>
    <div>
        <router-view/>
        <pimpinan-tambah/>
        <!-- <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/> -->
    </div>
</template>
<script>
import PimpinanTambah from './PimpinanTambah.vue'
export default {
    components: {
        PimpinanTambah 
    },
}
</script>