<template>
    <div>
        <v-app-bar app flat floating absolute>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Info Kegiatan
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <div v-if="loading">
                    <div class="d-grid-kegiatan-info">
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
                            Info Kegiatan Tidak Ditemukan
                        </span>
                    </v-alert>
                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link :to="{ name: 'kegiatan' }">
                        <v-list-item>
                            <v-list-item-avatar color="grey lighten-2">
                                <v-icon>mdi-flag</v-icon>
                            </v-list-item-avatar>
                            <v-list-item-content>
                                <v-list-item-title>
                                    Kembali ke daftar kegiatan
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-card>
                </div>
                <div v-else>
                    <div class="d-grid-kegiatan-info">
                        <div>
                            <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat class="mb-3">
                                <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
                            </v-card>
                            <div class="sticky-top">
                                <v-card color="grey lighten-5 overflow-hidden" rounded="xl" flat>
                                    <v-card-text>
                                        <div class="d-flex w-100">
                                            <v-avatar color="grey lighten-2">
                                                <v-icon>mdi-account-tie</v-icon>
                                            </v-avatar>
                                            <v-spacer/>
                                            <v-menu open-on-click content-class="shadow-sm rounded-lg" :close-on-content-click="false">
                                                <template #activator="{ attrs, on }">
                                                    <v-btn icon v-on.prevent="on" v-bind="attrs">
                                                        <v-icon>mdi-dots-vertical</v-icon>
                                                    </v-btn>
                                                </template>
                                                <v-list nav>
                                                    <v-subheader v-text="'Aksi'"/>
                                                    <v-list-item dense link @click="ubahInfoGuru(item.id_kegiatan)">
                                                        <v-list-item-icon>
                                                            <v-icon>mdi-pencil</v-icon>
                                                        </v-list-item-icon>
                                                        <v-list-item-content>
                                                            <v-list-item-title>
                                                                Ubah
                                                            </v-list-item-title>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                    <v-list-item dense link @click="hapusInfoGuru(item.id_kegiatan)">
                                                        <v-list-item-icon>
                                                            <v-icon>mdi-delete</v-icon>
                                                        </v-list-item-icon>
                                                        <v-list-item-content>
                                                            <v-list-item-title>
                                                                Hapus
                                                            </v-list-item-title>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                    <v-subheader v-text="'Rincian'"/>
                                                    <v-list-item dense>
                                                        <v-list-item-icon>
                                                            <v-icon>mdi-calendar</v-icon>
                                                        </v-list-item-icon>
                                                        <v-list-item-content>
                                                            <v-list-item-title>
                                                                {{ item.created_at | datetime }}
                                                            </v-list-item-title>
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                </v-list>
                                            </v-menu>
                                        </div>
                                    </v-card-text>
                                    <v-list-item>
                                        <v-list-item-content>
                                            <v-list-item-subtitle class="text--disabled">
                                                Nama Kegiatan
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="text-h5">
                                                {{ item.nama_kegiatan }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-map-marker</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Lokasi
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.lokasi }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-calendar</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Tanggal
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.tanggal | date }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-clock</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Waktu
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.waktu | time }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-calendar</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-subtitle>
                                                Mingguan
                                            </v-list-item-subtitle>
                                            <v-list-item-title class="">
                                                {{ item.hari }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                        <v-list-item-avatar color="teal lighten-5" class="" v-if="item.hari != null">
                                            <v-icon color="teal">mdi-check</v-icon>
                                        </v-list-item-avatar>
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
                                                {{ item.created_at | datetime }}
                                            </v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-card>
                            </div>
                        </div>
                        <div>
                            <div class="sticky-top" style="z-index: 1;">
                                <v-toolbar flat rounded="xl">
                                    <v-tabs align-with-title>
                                        <v-tab :to="{name: 'kegiatan.show'}" exact>Informasi</v-tab>
                                    </v-tabs>
                                </v-toolbar>
                            </div>
                            <v-container>
                                <router-view :item="item"/>
                            </v-container>
                        </div>
                    </div>
                </div>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            loading: false,
            item: {},
            ori: {},
            exists: false,
            breadcrumb: [
                {
                    text: 'Panel Admin',
                    disabled: false,
                    to: {name: 'admin'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Kegiatan',
                    disabled: false,
                    to: {name: 'kegiatan'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Info Kegiatan',
                    disabled: true,
                },
            ]
        }
    },
    computed: {
        ...mapState({
            items: state => state.kegiatan.items,
        }),
        ...mapGetters({
            session: 'kegiatan/getSession',
        }),
        id(){
            return this.$route.params.id_kegiatan
        }
    },
    watch: {
        session(){
            this.loadItem()
        }
    },
    methods: {
        ...mapMutations({  }),
        ...mapActions({
            showUbahDialog: 'kegiatan/setModalUbah',
            showHapusDialog: 'kegiatan/setModalHapus',
            getItem: 'kegiatan/show',
        }),
        openModalTambah(){},
        ubahInfoGuru(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoGuru(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItem(){
            this.loading = true
            this.exists = false

            let res = await this.getItem({id: this.id}).catch(e => {
                console.log("loadItem@GuruIndex.vue", e);
            });
            this.loading = false

            if(res?.data?.data){
                this.exists = true
                for(let key in res.data.data){
                    this.$set(this.item, key, res.data.data[key])
                    this.$set(this.ori, key, res.data.data[key])
                }
            }
        }
    },
    created(){
        this.loadItem()
    }
}
</script>