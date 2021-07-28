<template>
    <div>
        <router-view/>
        <kelas-tambah/>
        <kelas-ubah/>
        <!-- <sarana-tambah/>
        <sarana-ubah/>
        <sarana-hapus/> -->
    </div>
</template>
<script>
import KelasTambah from './KelasTambah.vue'
import KelasUbah from './KelasUbah.vue'
export default {
    components: {
        KelasTambah,
        KelasUbah
        
    },
}
</script>