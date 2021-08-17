<template>
    <div>
        <div class="d-grid-form">
            <v-text-field
                dense
                outlined
                v-model="item.nama_kegiatan"
                name="nama_kegiatan"
                label="Nama Kegiatan"
                :error-messages="errors.nama_kegiatan"
                @keyup="errors.nama_kegiatan = null"/>
            <v-dialog
                ref="tanggal"
                v-model="modal_tanggal"
                :return-value.sync="item.tanggal"
                persistent
                width="300px"
                content-class="shadow-sm rounded-xl"
                overlay-opacity=".25"
                eager>
                <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        dense
                        outlined
                        v-model="item.tanggal"
                        name="tanggal"
                        label="Tanggal Kegiatan"
                        append-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        :error-messages="errors.tanggal"/>
                </template>
                <v-date-picker v-model="item.tanggal" scrollable locale="id-id" first-day-of-week="1">
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal_tanggal_berdiri = false">
                        Batal
                    </v-btn>
                    <v-btn text color="primary" @click="$refs.tanggal.save(item.tanggal); errors.tanggal = null">
                        Pilih
                    </v-btn>
                </v-date-picker>
            </v-dialog>
            <input-waktu-kegiatan v-model="item.waktu" :errors="errors"/>
            <v-text-field
                dense
                outlined
                v-model="item.lokasi"
                name="lokasi"
                label="Lokasi"
                :error-messages="errors.lokasi"
                @keyup="errors.lokasi = null"/>
        </div>
        <div class="d-grid-form">
            <v-spacer v-if="!mingguan"></v-spacer>
            <v-text-field
                dense
                v-else
                readonly
                outlined
                v-model="hari"
                name="hari"
                label="Hari"
                :error-messages="errors.hari"
                @keyup="errors.hari = null"/>
            <v-switch
                v-model="mingguan"
                label="Kegiatan Mingguan"
                messages="Tandai Kegiatan sebagai Kegiatan Mingguan"/>
        </div>
    </div>
</template>
<script>
import moment from 'moment';
import InputWaktuKegiatan from './InputWaktuKegiatan.vue';
export default {
  components: { InputWaktuKegiatan },
    props: {
        errors: Object,
        value: {
            type: Object,
            default: ()=>{
                return {
                    nama_kegiatan: null,
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
        },
        hari() {
            return moment(this.item.tanggal).locale('id').format('dddd').toLowerCase();
        },
    },
    data() {
        return {
			modal_tanggal: false,
            mingguan: false,
        };
    },
    methods: {}
};
</script>
