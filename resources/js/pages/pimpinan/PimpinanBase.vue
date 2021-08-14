<template>
    <div>
        <router-view/>
        <pimpinan-tambah/>
        <pimpinan-ubah/>
        <!-- <guru-tambah/>
        <guru-ubah/>
        <guru-hapus/> -->
    </div>
</template>
<script>
import PimpinanTambah from './PimpinanTambah.vue'
import PimpinanUbah from './PimpinanUbah.vue'
export default {
    components: {
        PimpinanTambah,
        PimpinanUbah 
    },
}
</script>