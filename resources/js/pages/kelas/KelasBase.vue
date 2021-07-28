<template>
    <div>
        <router-view/>
        <kelas-tambah/>
        <!-- <sarana-tambah/>
        <sarana-ubah/>
        <sarana-hapus/> -->
    </div>
</template>
<script>
import KelasTambah from './KelasTambah.vue'
export default {
    components: {
        KelasTambah
        
    },
}
</script>