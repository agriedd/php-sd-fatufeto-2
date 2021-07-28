<template>
    <div>
        <router-view/>
        <kelas-tambah/>
        <kelas-ubah/>
        <kelas-hapus/>
    </div>
</template>
<script>
import KelasHapus from './KelasHapus.vue'
import KelasTambah from './KelasTambah.vue'
import KelasUbah from './KelasUbah.vue'
export default {
    components: {
        KelasTambah,
        KelasUbah,
        KelasHapus
        
    },
}
</script>