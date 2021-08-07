<template>
    <div>
        <router-view/>
        <jadwal-tambah/>
        <!-- <sarana-ubah/>
        <sarana-hapus/> -->
    </div>
</template>
<script>
import JadwalTambah from './JadwalTambah.vue'
export default {
    components: {
        JadwalTambah
    },
}
</script>