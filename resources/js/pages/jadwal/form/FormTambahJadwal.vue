<template>
    <div class="d-grid-form">
        <v-list outlined rounded class="mb-3">
            <v-list-item>
                <v-list-item-avatar color="grey lighten-4">
                    <v-img></v-img>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title>
                        Nama Kelas
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Nama Wali Kelas
                    </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-list>

        <!-- 
            hidden
         -->
        <input type="hidden" name="id_kelas" :value="$route.params.id_kelas">
        <input type="hidden" name="hari" :value="hari_formated">

        <v-text-field
            dense
            outlined
            v-model="item.mata_pelajaran"
            name="mata_pelajaran"
            label="Nama Mata Pelajaran"
            :error-messages="errors.mata_pelajaran"
            @keyup="errors.mata_pelajaran = null"/>
        <!-- <input-pilih-prasarana-sarana v-model="item.id_prasarana" :errors="errors"/> -->
        <v-text-field
            dense
            outlined
            v-model="hari"
            label="Hari"
            :error-messages="errors.hari"
            @keyup="errors.hari = null"
            readonly/>
        <div class="d-grid-form-2-cols">
            <input-waktu-mulai-jadwal :errors="errors" v-model="item.waktu_mulai"/>
            <input-waktu-berakhir-jadwal :errors="errors" v-model="item.waktu_berakhir"/>
        </div>
    </div>
</template>
<script>
import { mapState } from 'vuex';
import InputWaktuBerakhirJadwal from './InputWaktuBerakhirJadwal.vue';
import InputWaktuMulaiJadwal from './InputWaktuMulaiJadwal.vue';
export default {
  components: { InputWaktuMulaiJadwal, InputWaktuBerakhirJadwal },
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
        ...mapState({
            hari: state => state.jadwal.options.hari
        }),
        item: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            },
        },
        hari_formated(){
            let hari = this.hari || ""
            return hari.toLowerCase()
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
<style lang="scss" scoped>
    .d-grid-form-2-cols{
        display: grid;
        gap: .5rem;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    }
</style>