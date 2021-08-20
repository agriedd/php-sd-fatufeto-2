<template>
    <div>
        <div class="d-grid-form">
            <input-foto-gambar-kegiatan
                v-model="item"
                :errors="errors"
                :foto="item.foto ? item.foto : {}"/>
        </div>
    </div>
</template>
<script>
import InputFotoGambarKegiatan from './InputFotoGambarKegiatan.vue';
export default {
    components: { InputFotoGambarKegiatan },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_guru: null,
                    nip: null,
                    alamat: null,
                    input_foto: null,
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
        },
        /**
         * generate password from item.tanggal_lahir without divider
         * 
         */
        password(){
            let tanggal_lahir = this.item.tanggal_lahir;
            let password = 'password';
            if(tanggal_lahir){
                /**
                 * replace item item.tanggal_lahir special characters with nothing
                 */
                password = tanggal_lahir.replace(/[^0-9]/g, ''); 
            }
            return password;
        },
    },
    data() {
        return {
			modal_tanggal_lahir: false,
        };
    },
    methods: {}
};
</script>
