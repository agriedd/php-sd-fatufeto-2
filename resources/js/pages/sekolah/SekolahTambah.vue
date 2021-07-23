<template>
    <div>
        <v-dialog v-model="dialog" max-width="600" content-class="shadow-sm" overlay-opacity=".25" eager scrollable>
            <v-form @submit.prevent="submit" :disabled="loading">
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Form Tambah Profil Sekolah
                        </v-subheader>
                        <v-spacer/>
                        <v-avatar color="grey lighten-3">
                            <v-icon>mdi-school</v-icon>
                        </v-avatar>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text>
                        <form-tambah-sekolah/>
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
import FormTambahSekolah from './form/FormTambahSekolah.vue'
export default {
    components: { FormTambahSekolah },
    data(){
        return {
            loading: false,
            errors: {},
        }
    },
    computed: {
        ...mapState({
            value_dialog: state => state.sekolah.modal.tambah
        }),
        dialog: {
            get(){ return this.value_dialog },
            set(val){ this.setDialog(val) }
        }
    },
    methods: {
        ...mapMutations({
            setDialog: 'sekolah/SET_MODAL_TAMBAH'
        }),
        ...mapActions({
            storeSekolah: 'sekolah/store',
            updateSession: 'sekolah/updateSession',
        }),
        async submit(e){
            let data = new FormData(e.target)
            this.loading = true
            let res = await this.storeSekolah(data).catch(e => {
                console.log("storeSekolah@SekolahTambah.vue", e);
                if(e.response.status == 422)
                    this.errors = e.response.data.errors
            })
            this.loading = false
            console.log(res);
        }
    }
}
</script>