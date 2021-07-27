<template>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama"
            name="nama"
            label="Nama Sarana"
            :error-messages="errors.nama"
            @keyup="errors.nama = null"/>
        <input-pilih-prasarana-sarana v-model="item.id_prasarana" :errors="errors"/>
        <v-text-field
            dense
            outlined
            v-model="item.kondisi"
            name="kondisi"
            label="Kondisi"
            :error-messages="errors.kondisi"
            @keyup="errors.kondisi = null"/>
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
import InputPilihPrasaranaSarana from './InputPilihPrasaranaJadwal.vue';
export default {
    components: { InputPilihPrasaranaSarana },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama: null,
                    id_prasarana: null,
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
