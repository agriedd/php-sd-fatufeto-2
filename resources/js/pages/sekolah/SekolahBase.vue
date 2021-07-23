<template>
    <div>
        <router-view/>
        <sekolah-tambah/>
        <sekolah-ubah/>
        <sekolah-hapus/>
    </div>
</template>
<script>
import SekolahHapus from './SekolahHapus.vue'
import SekolahTambah from './SekolahTambah.vue'
import SekolahUbah from './SekolahUbah.vue'
export default {
    components: { SekolahTambah, SekolahUbah, SekolahHapus },
}
</script>