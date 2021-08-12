<template>
    <div>
        <router-view/>
        <siswa-tambah/>
        <siswa-ubah/>
        <siswa-hapus/>
    </div>
</template>
<script>
import SiswaHapus from './SiswaHapus.vue'
import SiswaTambah from './SiswaTambah.vue'
import SiswaUbah from './SiswaUbah.vue'
export default {
    components: {
        SiswaTambah,
        SiswaUbah,
        SiswaHapus,
    },
}
</script>