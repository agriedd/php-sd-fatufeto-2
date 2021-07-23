<template>
    <div>
        <v-dialog v-model="dialog" max-width="600" content-class="shadow-sm" overlay-opacity=".25" eager scrollable persistent>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Form Ubah Profil Sekolah > {{ item.nama_sekolah }}
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-school</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text v-if="dialog && exists">
                        <form-tambah-sekolah v-model="item"/>
                    </v-card-text>
                    <v-card-text v-else-if="dialog && loading">
                        <form-tambah-sekolah-placeholder/>
                    </v-card-text>
                    <v-divider/>
                    <v-card-actions>
                        <v-btn text @click="dialog = false" :loading="loading">
                            Batal
                        </v-btn>
                        <v-spacer/>
                        <v-btn text color="primary" type="submit" :loading="loading">
                            Simpan
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import FormTambahSekolah from './form/FormTambahSekolah.vue'
import FormTambahSekolahPlaceholder from './form/FormTambahSekolahPlaceholder.vue'
export default {
    components: { FormTambahSekolah, FormTambahSekolahPlaceholder },
    data(){
        return {
            loading: false,
            errors: {},
            item: {},
            ori: {},
            exists: false,
        }
    },
    computed: {
        ...mapState({
            value_dialog: state => state.sekolah.modal.ubah,
            id: state => state.sekolah.selected.id
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(val){ this.setDialog(val) }
        }
    },
    methods: {
        ...mapMutations({
            setDialog: 'sekolah/SET_MODAL_UBAH'
        }),
        ...mapActions({
            updateSekolah: 'sekolah/update',
            findSekolah: 'sekolah/show',
            updateSession: 'sekolah/updateSession',
            notif: 'notifikasi/show'
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.updateSekolah({ data, id: this.id }).catch(e => {
                console.log("updateSekolah@SekolahTambah.vue", e);
                if(e.response.status == 422)
                    this.errors = e.response.data.errors
                this.notif({
                    message: e.message
                })
            })
            this.loading = false
            if(res){
                notif({
                    message: e.message,
                    color: 'teal',
                })
            }
        },
        async loadItem(){
            this.exists = false
            this.loading = true
            let res = await this.findSekolah({ id: this.id }).catch(e => {
                console.log("loadItem@SekolahTambah.vue", e);
                this.notif({
                    message: e.message
                })
            })
            this.loading = false
            if(res){
                this.exists = true
                for(let key in res.data.data){
                    this.$set(this.item, key, res.data.data[key])
                    this.$set(this.ori, key, res.data.data[key])
                }
            }
        }
    },
    watch: {
        id(val){
            val && this.loadItem()
        }
    }
}
</script>