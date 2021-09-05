<template>
    <div>
        <router-view/>
        <template v-if="!isPimpinan">
            <prasarana-tambah/>
            <prasarana-ubah/>
            <prasarana-hapus/>
        </template>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import PrasaranaHapus from './PrasaranaHapus.vue'
import PrasaranaTambah from './PrasaranaTambah.vue'
import PrasaranaUbah from './PrasaranaUbah.vue'
export default {
    components: {
        PrasaranaTambah,
        PrasaranaUbah,
        PrasaranaHapus 
    },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan'
        })
    }
}
</script>