<template>
    <div>
        <router-view/>
        <template v-if="!isPimpinan">
            <sarana-tambah/>
            <sarana-ubah/>
            <sarana-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import SaranaHapus from './SaranaHapus.vue'
import SaranaTambah from './SaranaTambah.vue'
import SaranaUbah from './SaranaUbah.vue'
export default {
    components: {
        SaranaTambah,
        SaranaUbah,
        SaranaHapus
    },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>