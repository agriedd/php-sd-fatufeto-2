<template>
    <div>
        <router-view/>
        <kelas-tambah v-if="!isPimpinan"/>
        <kelas-ubah v-if="!isPimpinan"/>
        <kelas-hapus v-if="!isPimpinan"/>
    </div>
</template>
<script>
import { mapGetters } from 'vuex'
import KelasHapus from './KelasHapus.vue'
import KelasTambah from './KelasTambah.vue'
import KelasUbah from './KelasUbah.vue'
export default {
    components: {
        KelasTambah,
        KelasUbah,
        KelasHapus
        
    },
    computed: {
        ...mapGetters({
            isPimpinan: 'login/isPimpinan',
        }),
    }
}
</script>