<template>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama_siswa"
            name="nama_siswa"
            label="Nama Siswa"
            :error-messages="errors.nama_siswa"
            @keyup="errors.nama_siswa = null"/>
        <v-spacer></v-spacer>
        <v-text-field
            dense
            outlined
            v-model="item.nis"
            name="nis"
            label="NIS"
            :error-messages="errors.nis"
            @keyup="errors.nis = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.nisn"
            name="nisn"
            label="NISN"
            :error-messages="errors.nisn"
            @keyup="errors.nisn = null"/>
        <input-jenis-kelamin-siswa
            v-model="item.jenis_kelamin" 
            :errors="errors" 
            @change="errors.jenis_kelamin = null"/>
        <input-agama-siswa
            v-model="item.agama" 
            :errors="errors" 
            @change="errors.agama = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.tempat_lahir"
            name="tempat_lahir"
            label="Tempat Lahir"
            :error-messages="errors.tempat_lahir"
            @keyup="errors.tempat_lahir = null"/>
        <v-dialog
            ref="tanggal_lahir"
            v-model="modal_tanggal_lahir"
            :return-value.sync="item.tanggal_lahir"
            persistent
            width="300px"
			content-class="shadow-sm rounded-xl"
			overlay-opacity=".25"
            eager>
            <template v-slot:activator="{ on, attrs }">
				<v-text-field
					dense
					outlined
					v-model="item.tanggal_lahir"
					name="tanggal_lahir"
					label="Tanggal Lahir"
                    append-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
					:error-messages="errors.tanggal_lahir"/>
            </template>
            <v-date-picker v-model="item.tanggal_lahir" scrollable locale="id-id" first-day-of-week="1">
                <v-spacer></v-spacer>
                <v-btn text color="primary" @click="modal_tanggal_berdiri = false">
                    Batal
                </v-btn>
                <v-btn text color="primary" @click="$refs.tanggal_lahir.save(item.tanggal_lahir); errors.tanggal_lahir = null">
                    Pilih
                </v-btn>
            </v-date-picker>
        </v-dialog>
        <v-text-field
            dense
            outlined
            v-model="item.kip"
            name="kip"
            label="KIP"
            :error-messages="errors.kip"
            @keyup="errors.kip = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.alamat"
            name="alamat"
            label="Alamat"
            :error-messages="errors.alamat"
            @keyup="errors.alamat = null"/>
        <v-text-field
            v-model="guru.kelas.id_kelas"
            v-if="guru && guru.kelas"
            outlined
            dense
            readonly
            :success-messages="`Kelas mengikuti ${guru.kelas.nama}`"
            name="id_kelas"/>
        <input-kelas-siswa
            v-model="item.id_kelas" 
            :errors="errors" 
            @change="errors.id_kelas = null"
            v-else/>
    </div>
</template>
<script>
import { mapState } from 'vuex';
import InputAgamaSiswa from './InputAgamaSiswa.vue';
import InputJenisKelaminSiswa from './InputJenisKelaminSiswa.vue';
import InputKelasSiswa from './InputKelasSiswa.vue';
export default {
    components: {
        InputJenisKelaminSiswa,
        InputAgamaSiswa,
        InputKelasSiswa
    },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_siswa: null,
                    nis: null,
                    alamat: null,
                }
            }
        }
    },
    computed: {
        ...mapState({
            guru: state => state.login?.guru?.user,
        }),
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
