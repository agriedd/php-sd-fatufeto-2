<template>
    <div>
        <router-view/>
        <siswa-tambah/>
        <!-- <guru-ubah/>
        <guru-hapus/> -->
    </div>
</template>
<script>
import SiswaTambah from './SiswaTambah.vue'
export default {
    components: {
        SiswaTambah 
    },
}
</script>