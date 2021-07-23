<template>
    <div>
        <router-view/>
        <sekolah-tambah/>
        <sekolah-ubah/>
    </div>
</template>
<script>
import SekolahTambah from './SekolahTambah.vue'
import SekolahUbah from './SekolahUbah.vue'
export default {
    components: { SekolahTambah, SekolahUbah },
}
</script>