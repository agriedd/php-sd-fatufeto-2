<template>
    <div>
        <router-view/>
        <prasarana-tambah/>
        <prasarana-ubah/>
        <prasarana-hapus/>
    </div>
</template>
<script>
import PrasaranaHapus from './PrasaranaHapus.vue'
import PrasaranaTambah from './PrasaranaTambah.vue'
import PrasaranaUbah from './PrasaranaUbah.vue'
export default {
    components: {
        PrasaranaTambah,
        PrasaranaUbah,
        PrasaranaHapus 
    },
}
</script>