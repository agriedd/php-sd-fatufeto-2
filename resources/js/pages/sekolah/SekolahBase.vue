<template>
    <div>
        <router-view/>
        <template v-if="!isPimpinan">
            <sekolah-tambah/>
            <sekolah-ubah/>
            <sekolah-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import SekolahHapus from './SekolahHapus.vue'
import SekolahTambah from './SekolahTambah.vue'
import SekolahUbah from './SekolahUbah.vue'
export default {
    components: { SekolahTambah, SekolahUbah, SekolahHapus },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan',
        }),
    }
}
</script>