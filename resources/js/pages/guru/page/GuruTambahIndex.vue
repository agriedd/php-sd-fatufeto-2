<template>
    <div></div>
</template>
<script>
import { mapMutations } from 'vuex'
export default {
    methods: {
        ...mapMutations({
            showTambahDialog: 'sekolah/SET_MODAL_TAMBAH',
        })
    },
    created(){
        this.showTambahDialog(true)
    }
}
</script>