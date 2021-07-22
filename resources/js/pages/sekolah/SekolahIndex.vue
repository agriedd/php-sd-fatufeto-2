<template>
    <div>
        <v-app-bar app flat floating>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Sekolah
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <div class="mx-auto" style="max-width: 400px" v-if="!exists && !loading">
                    <v-alert prominent text type="warning" rounded="xl">
                        <span>
                            Profil Sekolah Masih Kosong
                        </span>
                        <div>
                            <small>
                                Silahkan menambah profil sekolah
                            </small>
                        </div>
                    </v-alert>
                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link @click="openModalTambah">
                        <div style="min-height: 300px" class="d-flex">
                            <div class="w-100">
                                <div class="content-middle">
                                    <v-card-text>
                                        <div class="d-flex flex-column align-center w-100">
                                            <v-avatar color="grey lighten-2">
                                                <v-icon v-text="'mdi-plus'" color="grey"/>
                                            </v-avatar>
                                            <div class="grow-1 pl-4">
                                                <v-subheader>
                                                    Tambah Profil Sekolah
                                                </v-subheader>
                                            </div>
                                        </div>
                                    </v-card-text>
                                </div>
                            </div>
                        </div>
                    </v-card>
                </div>
                <div v-else>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nulla, officia quibusdam recusandae quae quas repellat quisquam esse. Sunt placeat nesciunt vitae dolore quibusdam tempore obcaecati debitis nostrum quod doloribus!
                </div>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import { mapGetters, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            loading: false
        }
    },
    computed: {
        ...mapGetters({
            total_sekolah: 'sekolah/getTotal'
        }),
        exists(){
            return this.total_sekolah > 0
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'sekolah/SET_MODAL_TAMBAH'
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        }
    }
}
</script>