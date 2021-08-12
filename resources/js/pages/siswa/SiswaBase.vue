<template>
    <div>
        <router-view/>
        <siswa-tambah/>
        <siswa-ubah/>
    </div>
</template>
<script>
import SiswaTambah from './SiswaTambah.vue'
import SiswaUbah from './SiswaUbah.vue'
export default {
    components: {
        SiswaTambah,
        SiswaUbah,
    },
}
</script>