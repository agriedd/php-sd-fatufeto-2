<template>
    <v-container>
        <div v-if="loading">
            <div class="d-grid-kelas-info">
                <div>
                    <v-card color="grey lighten-4 overflow-hidden" flat rounded="xl" class="mb-3">
                        <v-card-text>
                            Memuat...
                        </v-card-text>
                    </v-card>
                    <v-card v-for="i in 1" :key="i" color="grey lighten-4 overflow-hidden" flat rounded="xl">
                        <div style="min-height: 300px">
                            <v-card-text>
                                <v-skeleton-loader type="avatar" loading/>
                            </v-card-text>
                        </div>
                    </v-card>
                </div>
            </div>
        </div>
        <div class="mx-auto" style="max-width: 400px" v-else-if="!exists && !loading">
            <v-alert prominent text type="warning" rounded="xl">
                <span>
                    Info Kelas Tidak Ditemukan
                </span>
            </v-alert>
            <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link :to="{ name: 'kelas' }">
                <v-list-item>
                    <v-list-item-avatar color="grey lighten-2">
                        <v-icon>mdi-package-variant</v-icon>
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title>
                            Kembali ke daftar kelas
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-card>
        </div>
        <div v-else>
            <div class="d-grid-kelas-info">
                <div>
                    <div>
                        <v-card color="grey lighten-5 overflow-hidden" rounded="xl" flat>
                            <v-card-text>
                                <div class="d-flex w-100">
                                    <v-avatar color="grey lighten-2">
                                        <v-icon>mdi-package-variant</v-icon>
                                    </v-avatar>
                                    <v-spacer/>
                                </div>
                            </v-card-text>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-subtitle class="text--disabled">
                                        Nama Kelas
                                    </v-list-item-subtitle>
                                    <v-list-item-title class="text-h5">
                                        {{ item.kelas.nama }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-divider inset/>
                            <v-list-item>
                                <v-list-item-icon>
                                    <v-icon>mdi-informatuib</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-subtitle>
                                        Keterangan
                                    </v-list-item-subtitle>
                                    <v-list-item-title class="">
                                        {{ item.kelas.keterangan }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-list-item>
                                <v-list-item-icon>
                                    <v-icon>mdi-account-group</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-subtitle>
                                        Jumlah Siswa
                                    </v-list-item-subtitle>
                                    <v-list-item-title class="">
                                        {{ (item.kelas.jumlah || 0) | number }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-divider inset/>
                            <v-list-item>
                                <v-list-item-icon>
                                    <v-icon>mdi-calendar</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-subtitle class="">
                                        dibuat pada
                                    </v-list-item-subtitle>
                                    <v-list-item-title class="">
                                        {{ item.kelas.created_at | datetime }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-card>
                    </div>
                </div>
            </div>
        </div>
    </v-container>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
export default {
    props: {
        item: Object
    },
    data(){
        return {
            loading: false,
            breadcrumb: [
                {
                    text: 'Panel Admin',
                    disabled: false,
                    to: {name: 'admin'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Kelas',
                    disabled: false,
                    to: {name: 'kelas'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Info Kelas',
                    disabled: true,
                },
            ]
        }
    },
    computed: {
        ...mapGetters({
            session: 'kelas/getSession',
        }),
        exists(){
            return this.item.kelas?.id_kelas
        }
    },
    watch: {
        session(){
            this.loadItem()
        }
    },
    methods: {
        ...mapMutations({  }),
    },
    created(){}
}
</script>