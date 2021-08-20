<template>
    <div>
        <v-dialog v-model="dialog" max-width="400" content-class="shadow-sm" overlay-opacity=".25" eager scrollable>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Form Tambah Gambar Kegiatan
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-image</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog || alive">
                        <form-tambah-gambar-kegiatan :errors="errors"/>
                    </v-card-text>
                    <v-divider/>
                    <v-card-actions>
                        <v-spacer/>
                        <v-btn text color="primary" type="submit" :loading="loading">
                            Tambah
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import FormTambahGambarKegiatan from './form/FormTambahGambarKegiatan.vue'
export default {
    components: { FormTambahGambarKegiatan },
    data(){
        return {
            loading: false,
            errors: {},
            alive: true,
        }
    },
    computed: {
        ...mapState({
            value_dialog: state => state.kegiatan.gambar.modal.tambah
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(val){ this.setDialog(val) }
        }
    },
    methods: {
        ...mapMutations({
            setDialog: 'kegiatan/gambar/SET_MODAL_TAMBAH'
        }),
        ...mapActions({
            storeGambarKegiatan: 'kegiatan/gambar/store',
            updateSession: 'kegiatan/gambar/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.storeGambarKegiatan({id_kegiatan: this.$route.params.id_kegiatan, data}).catch(e => {
                console.log("storeGambarKegiatan@GambarKegiatanTambah.vue", e);
                e.response.status == 422 && this.setErrorForm(e)
                this.notif({
                    message: e.message
                })
            })
            this.loading = false
            console.log(res);
            if(res){
                this.dialog = false
                this.alive = false
                this.updateSession()
            }
        }
    },
    watch: {
        dialog(val){
            if(val)
                this.alive = true
        }
    }
}
</script>