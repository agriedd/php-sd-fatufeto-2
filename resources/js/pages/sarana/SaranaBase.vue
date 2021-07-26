<template>
    <div>
        <router-view/>
        <sarana-tambah/>
        <sarana-ubah/>
        <!-- <prasarana-ubah/>
        <prasarana-hapus/> -->
    </div>
</template>
<script>
import SaranaTambah from './SaranaTambah.vue'
import SaranaUbah from './SaranaUbah.vue'
export default {
    components: {
        SaranaTambah,
        SaranaUbah
    },
}
</script>