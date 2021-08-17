<template>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama"
            name="nama"
            label="Nama Guru"
            :error-messages="errors.nama"
            @keyup="errors.nama = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.nip"
            name="nip"
            label="NIP"
            :error-messages="errors.nip"
            @keyup="errors.nip = null"/>
        <input-jenis-kelamin-guru 
            v-model="item.jenis_kelamin" 
            :errors="errors" 
            @change="errors.jenis_kelamin = null"/>
        <v-spacer/>
        <v-text-field
            dense
            outlined
            v-model="item.jabatan"
            name="jabatan"
            label="Jabatan"
            :error-messages="errors.jabatan"
            @keyup="errors.jabatan = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.pangkat"
            name="pangkat"
            label="Pangkat"
            :error-messages="errors.pangkat"
            @keyup="errors.pangkat = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.golongan"
            name="golongan"
            label="Golongan"
            :error-messages="errors.golongan"
            @keyup="errors.golongan = null"/>
        <v-spacer/>
        <v-text-field
            dense
            outlined
            v-model="item.pendidikan_terakhir"
            name="pendidikan_terakhir"
            label="Pendidikan Terakhir"
            :error-messages="errors.pendidikan_terakhir"
            @keyup="errors.pendidikan_terakhir = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.pendidikan_profesi"
            name="pendidikan_profesi"
            label="Pendidikan Profesi"
            :error-messages="errors.pendidikan_profesi"
            @keyup="errors.pendidikan_profesi = null"/>
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
            v-model="item.telepon"
            name="telepon"
            label="Telepon"
            :error-messages="errors.telepon"
            @keyup="errors.telepon = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.alamat"
            name="alamat"
            label="Alamat"
            :error-messages="errors.alamat"
            @keyup="errors.alamat = null"/>
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
