<template>
    <div>
        <router-view/>
        <jadwal-tambah/>
        <jadwal-ubah/>
        <jadwal-hapus/>
    </div>
</template>
<script>
import JadwalHapus from './JadwalHapus.vue'
import JadwalTambah from './JadwalTambah.vue'
import JadwalUbah from './JadwalUbah.vue'
export default {
    components: {
        JadwalTambah,
        JadwalUbah,
        JadwalHapus
    },
}
</script>