<template>
    <div>
        <v-app-bar app flat absolute hide-on-scroll>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Sekolah
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <div v-if="loading">
                    <div class="d-grid-sekolah">
                        <v-card v-for="i in total_sekolah || 1" :key="i" color="grey lighten-4 overflow-hidden" flat rounded="xl">
                            <div style="min-height: 300px">
                                <v-card-text>
                                    <v-skeleton-loader type="avatar" loading/>
                                </v-card-text>
                            </div>
                        </v-card>
                    </div>
                </div>
                <div class="mx-auto" style="max-width: 400px" v-else-if="!exists && !loading">
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
                    <div class="d-grid-sekolah">
                        <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link v-for="(item, i) in items" :key="item.id_profil" :to="{ name: 'sekolah.show', params: { id_profil: item.id_profil } }">
                            <v-card-text>
                                <div class="d-flex w-100">
                                    <v-avatar color="grey lighten-2" v-if="i == 0">
                                        <v-icon>mdi-pin</v-icon>
                                    </v-avatar>
                                    <v-spacer/>
                                    <v-menu open-on-click content-class="shadow-sm rounded-lg" :close-on-content-click="false" v-if="!isPimpinan">
                                        <template #activator="{ attrs, on }">
                                            <v-btn icon v-on="on" v-bind="attrs" @click.prevent="">
                                                <v-icon>mdi-dots-vertical</v-icon>
                                            </v-btn>
                                        </template>
                                        <v-list nav>
                                            <v-subheader v-text="'Aksi'"/>
                                            <v-list-item dense link :to="{ name: 'sekolah.show', params: { id_profil: item.id_profil }}">
                                                <v-list-item-icon>
                                                    <v-icon>mdi-school</v-icon>
                                                </v-list-item-icon>
                                                <v-list-item-content>
                                                    <v-list-item-title>
                                                        Lihat Rincian
                                                    </v-list-item-title>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-list-item dense link @click="ubahInfoSekolah(item.id_profil)">
                                                <v-list-item-icon>
                                                    <v-icon>mdi-pencil</v-icon>
                                                </v-list-item-icon>
                                                <v-list-item-content>
                                                    <v-list-item-title>
                                                        Ubah
                                                    </v-list-item-title>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-list-item dense link @click="hapusInfoSekolah(item.id_profil)">
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
                            <v-card-title>
                                {{ item.nama_sekolah }}
                            </v-card-title>
                            <v-card-subtitle>
                                {{ item.tgl_berdiri }}
                            </v-card-subtitle>
                            <v-spacer/>
                            <v-card-text>
                                <div>
                                    {{ item.alamat }}
                                </div>
                                <div>
                                    NPSN. {{ item.npsn }}
                                </div>
                            </v-card-text>
                        </v-card>
                        <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link @click="openModalTambah" v-if="!exists && !isPimpinan">
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
                </div>
                <div>
                    <router-view/>
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
        }
    },
    computed: {
        ...mapState({
            items: state => state.sekolah.items,
        }),
        ...mapGetters({
            isPimpinan: 'login/isPimpinan',
            total_sekolah: 'sekolah/getTotal',
            session: 'sekolah/getSession',
        }),
        exists(){
            return this.total_sekolah > 0
        }
    },
    watch: {
        session(){
            this.loadItems()
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'sekolah/SET_MODAL_TAMBAH',
            setItems: 'sekolah/SET_ITEMS',
        }),
        ...mapActions({
            showUbahDialog: 'sekolah/setModalUbah',
            showHapusDialog: 'sekolah/setModalHapus',
            getItems: 'sekolah/get',
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
        ubahInfoSekolah(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoSekolah(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItems({}).catch(e => {
                console.log("loadItem@SekolahIndex.vue", e);
            });
            this.loading = false

            if(res?.data?.data){
                this.setItems(res?.data?.data)
            }
        }
    },
    created(){
        this.loadItems()
    }
}
</script>