<template>
    <div>
        <router-view/>
        <template v-if="!isPimpinan">
            <guru-tambah/>
            <guru-ubah/>
            <guru-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import GuruHapus from './GuruHapus.vue'
import GuruTambah from './GuruTambah.vue'
import GuruUbah from './GuruUbah.vue'
export default {
    components: { 
        GuruTambah, 
        GuruUbah, 
        GuruHapus
    },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan'
        })
    },
}
</script>