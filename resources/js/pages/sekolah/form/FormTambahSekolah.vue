// hello
<template>
    <div class="d-grid-form">
        <v-text-field
            dense
            outlined
            v-model="item.nama_sekolah"
            name="nama_sekolah"
            label="Nama Sekolah"
            prefix="Sekolah Dasar"
            :error-messages="errors.nama_sekolah"
            @keyup="errors.nama_sekolah = null"/>
        <v-spacer />
        <v-text-field
            dense
            outlined
            v-model="item.jenjang"
            name="jenjang"
            label="Jenjang"
            :error-messages="errors.jenjang"
            @keyup="errors.jenjang = null"/>
        <v-dialog
            ref="tgl_berdiri"
            v-model="modal_tanggal_berdiri"
            :return-value.sync="item.tgl_berdiri"
            persistent
            width="300px"
			content-class="shadow-sm"
			overlay-opacity=".25"
            eager>
            <template v-slot:activator="{ on, attrs }">
				<v-text-field
					dense
					outlined
					v-model="item.tgl_berdiri"
					name="tgl_berdiri"
					label="Tanggal Berdiri"
                    readonly
                    v-bind="attrs"
                    v-on="on"
					:error-messages="errors.tgl_berdiri"
					@keyup="errors.tgl_berdiri = null"/>
            </template>
            <v-date-picker v-model="item.tgl_berdiri" scrollable locale="id-id" first-day-of-week="1">
                <v-spacer></v-spacer>
                <v-btn text color="primary" @click="modal_tanggal_berdiri = false">
                    Batal
                </v-btn>
                <v-btn text color="primary" @click="$refs.tgl_berdiri.save(item.tgl_berdiri)">
                    Pilih
                </v-btn>
            </v-date-picker>
        </v-dialog>
		<input-stuktur-organisasi-sekolah
			v-model="item"
			:errors="errors"
            :foto="item.struktur_organisasi"/>
		<input-visi-misi-sekolah
			v-model="item"
			:errors="errors"/>
        <v-text-field
            dense
            outlined
            v-model="item.alamat"
            name="alamat"
            label="Alamat"
            :error-messages="errors.alamat"
            @keyup="errors.alamat = null"/>
        <v-text-field
            dense
            outlined
            v-model="item.npsn"
            name="npsn"
            label="NPSN"
            :error-messages="errors.npsn"
            @keyup="errors.npsn = null"/>
    </div>
</template>
<script>
import InputStukturOrganisasiSekolah from './InputStukturOrganisasiSekolah.vue';
import InputVisiMisiSekolah from './InputVisiMisiSekolah.vue';
export default {
    components: { InputStukturOrganisasiSekolah, InputVisiMisiSekolah },
    props: {
        value: {
            type: Object,
            default: ()=>{
                return {
                    id_profil: null,
                    nama_sekolah: null,
                    jenjang: null,
                    tgl_berdiri: null,
                    struktur_organisasi: null,
                    visi_misi: null,
                    alamat: null,
                    npsn: null
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
			modal_tanggal_berdiri: false,
            errors: {}
        };
    },
    methods: {}
};
</script>
