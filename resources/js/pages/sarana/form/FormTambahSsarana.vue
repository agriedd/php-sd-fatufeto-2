<template>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama"
            name="nama"
            label="Nama Prasarana"
            :error-messages="errors.nama"
            @keyup="errors.nama = null"/>
        <input-pilih-sekolah-prasarana v-model="item.id_sekolah" :errors="errors"/>
        <v-text-field
            dense
            outlined
            v-model="item.spesifikasi"
            name="spesifikasi"
            label="Spesifikasi"
            :error-messages="errors.spesifikasi"
            @keyup="errors.spesifikasi = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.jumlah"
            name="jumlah"
            label="Jumlah"
            type="number"
            min="0"
            :error-messages="errors.jumlah"
            @keyup="errors.jumlah = null"/>
    </div>
</template>
<script>
import InputPilihSekolahPrasarana from './InputPilihSekolahPrasarana.vue';
export default {
    components: { InputPilihSekolahPrasarana },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama: null,
                    id_sekolah: null,
                }
            }
        }
    },
    computed: {
        item: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            },
        }
    },
    data() {
        return {
			// modal_tanggal_lahir: false,
        };
    },
    methods: {}
};
</script>
