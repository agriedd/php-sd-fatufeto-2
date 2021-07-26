<template>
    <div>
        <router-view/>
        <sarana-tambah/>
        <!-- <prasarana-ubah/>
        <prasarana-hapus/> -->
    </div>
</template>
<script>
import SaranaTambah from './SaranaTambah.vue'
export default {
    components: {
        SaranaTambah
    },
}
</script>