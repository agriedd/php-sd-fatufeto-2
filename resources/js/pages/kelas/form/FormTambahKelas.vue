<template>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama"
            name="nama"
            label="Nama Kelas"
            :error-messages="errors.nama"
            @keyup="errors.nama = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.keterangan"
            name="keterangan"
            label="Keterangan"
            :error-messages="errors.keterangan"
            @keyup="errors.keterangan = null"/>
        <input-pilih-wali-kelas v-model="item.id_guru" :errors="errors"/>
        <input-pilih-prasarana v-model="item.id_prasarana" :errors="errors"/>
    </div>
</template>
<script>
import InputPilihWaliKelas from './InputPilihWaliKelas.vue';
import InputPilihPrasarana from './InputPilihPrasarana.vue';
export default {
    components: { InputPilihWaliKelas, InputPilihPrasarana },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama: null,
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
