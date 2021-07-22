<template>
    <div>
        <v-dialog v-model="dialog" max-width="600" content-class="shadow-sm" overlay-opacity=".25" eager scrollable>
            <v-form>
                <v-card>
                    <v-toolbar flat>
                        <v-subheader>
                            Form Tambah Profil Sekolah
                        </v-subheader>
                        <v-spacer/>
                        <v-icon color="primary">mdi-school</v-icon>
                    </v-toolbar>
                    <v-divider/>
                    <v-card-text>
                        <form-tambah-sekolah/>
                    </v-card-text>
                    <v-divider/>
                    <v-card-actions>
                        <v-spacer/>
                        <v-btn text color="primary">
                            Tambah
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapMutations, mapState } from 'vuex'
import FormTambahSekolah from './form/FormTambahSekolah.vue'
export default {
    components: { FormTambahSekolah },
    data(){
        return {

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
        })
    }
}
</script>