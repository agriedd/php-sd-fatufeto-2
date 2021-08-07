<template>
    <div>
        <router-view/>
        <jadwal-tambah/>
        <jadwal-ubah/>
        <!-- <sarana-ubah/>
        <sarana-hapus/> -->
    </div>
</template>
<script>
import JadwalTambah from './JadwalTambah.vue'
import JadwalUbah from './JadwalUbah.vue'
export default {
    components: {
        JadwalTambah,
        JadwalUbah
    },
}
</script>