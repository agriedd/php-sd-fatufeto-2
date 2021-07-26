<template>
    <div>
        <router-view/>
        <sarana-tambah/>
        <sarana-ubah/>
        <sarana-hapus/>
    </div>
</template>
<script>
import SaranaHapus from './SaranaHapus.vue'
import SaranaTambah from './SaranaTambah.vue'
import SaranaUbah from './SaranaUbah.vue'
export default {
    components: {
        SaranaTambah,
        SaranaUbah,
        SaranaHapus
    },
}
</script>