<template>
    <div>
        <router-view/>
        <sekolah-tambah/>
    </div>
</template>
<script>
import SekolahTambah from './SekolahTambah.vue'
export default {
    components: { SekolahTambah },
}
</script>