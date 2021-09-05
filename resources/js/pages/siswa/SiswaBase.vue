<template>
    <div>
        <router-view/>
        <template v-if="!isPimpinan">
            <siswa-tambah/>
            <siswa-ubah/>
            <siswa-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import SiswaHapus from './SiswaHapus.vue'
import SiswaTambah from './SiswaTambah.vue'
import SiswaUbah from './SiswaUbah.vue'
export default {
    components: {
        SiswaTambah,
        SiswaUbah,
        SiswaHapus,
    },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>