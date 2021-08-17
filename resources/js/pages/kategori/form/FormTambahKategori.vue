<template>
<div>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama_kategori"
            name="nama_kategori"
            label="Nama Kategori"
            :error-messages="errors.nama_kategori"
            @keyup="errors.nama_kategori = null"/>
    </div>
</div>
</template>
<script>
import InputJenisKelaminGuru from './InputJenisKelaminKategori.vue';
export default {
    components: { InputJenisKelaminGuru },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_guru: null,
                    nip: null,
                    alamat: null,
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
			modal_tanggal_lahir: false,
        };
    },
    methods: {}
};
</script>
