<template>
    <div>
        <v-app-bar app flat absolute class="white">
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
            <v-toolbar-title>
                Prasarana
            </v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <div v-if="loading">
                    <div class="d-grid-sekolah">
                        <v-card v-for="i in 3" :key="i" color="grey lighten-4 overflow-hidden" flat rounded="xl">
                            <div style="min-height: 300px">
                                <v-card-text>
                                    <v-skeleton-loader type="avatar" loading/>
                                </v-card-text>
                            </div>
                        </v-card>
                    </div>
                </div>
                <div v-else style="position: relative">
                    <v-expand-transition>
                        <div class="d-grid-sekolah" v-if="show">
                            <v-card color="indigo lighten-5 overflow-hidden" rounded="xl" flat link :to="{ name: 'prasarana.list' }">
                                <v-card-text>
                                    <div class="d-flex w-100">
                                        <v-avatar color="indigo lighten-4">
                                            <v-icon>mdi-pin</v-icon>
                                        </v-avatar>
                                        <v-spacer/>
                                    </div>
                                </v-card-text>
                                <v-card-text class="text-h1 text-right">
                                    {{ total }}
                                </v-card-text>
                                <v-card-text class="text-right pt-0">
                                    Total Prasarana
                                </v-card-text>
                            </v-card>
                            <div class="d-lg-block d-none">
                                <div class="d-grid-sekolah mini fill-height">
                                    <div class="content-middle">
                                        <v-subheader>
                                            Terbaru
                                        </v-subheader>
                                    </div>
                                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link v-for="(item, i) in items" :key="item.id_prasarana" :to="{ name: 'prasarana.show', params: { id_prasarana: item.id_prasarana } }">
                                        <v-card-text>
                                            <div class="d-flex w-100">
                                                <v-spacer/>
                                                <v-menu open-on-click content-class="shadow-sm rounded-lg" :close-on-content-click="false">
                                                    <template #activator="{ attrs, on }">
                                                        <v-btn icon v-on="on" v-bind="attrs" @click.prevent="">
                                                            <v-icon>mdi-dots-vertical</v-icon>
                                                        </v-btn>
                                                    </template>
                                                    <v-list nav>
                                                        <v-subheader v-text="'Aksi'"/>
                                                        <v-list-item dense link :to="{ name: 'prasarana.show', params: { id_prasarana: item.id_prasarana }}">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-package-variant</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Lihat Rincian
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-list-item dense link @click="ubahInfoPrasarana(item.id_prasarana)">
                                                            <v-list-item-icon>
                                                                <v-icon>mdi-pencil</v-icon>
                                                            </v-list-item-icon>
                                                            <v-list-item-content>
                                                                <v-list-item-title>
                                                                    Ubah
                                                                </v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>
                                                        <v-list-item dense link @click="hapusInfoPrasarana(item.id_prasarana)">
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
                                        <v-card-text>
                                            {{ item.nama }}
                                            <div class="text-truncate">
                                                <small>
                                                    {{ item.nip }}
                                                </small>
                                            </div>
                                        </v-card-text>
                                    </v-card>
                                    <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat link @click="updateSession()">
                                        <div class="content-middle">
                                            <v-icon>mdi-refresh</v-icon>
                                        </div>
                                    </v-card>
                                </div>
                            </div>
                            <v-card color="pink lighten-5 overflow-hidden" rounded="xl" flat link @click="openModalTambah">
                                <div style="min-height: 300px" class="d-flex">
                                    <div class="w-100">
                                        <div class="content-middle">
                                            <v-card-text>
                                                <div class="d-flex flex-column align-center w-100">
                                                    <v-avatar color="pink lighten-4">
                                                        <v-icon v-text="'mdi-plus'" color="grey"/>
                                                    </v-avatar>
                                                    <div class="grow-1 pl-4">
                                                        <v-subheader>
                                                            Tambah Prasarana
                                                        </v-subheader>
                                                    </div>
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                        </div>
                    </v-expand-transition>
                    <v-fab-transition>
                        <v-btn fab class="shadow" bottom absolute right dark :key="show" @click="show = !show">
                            <v-icon>mdi-chevron-{{ show ? 'up' : 'down' }}</v-icon>
                        </v-btn>
                    </v-fab-transition>
                </div>
            </v-container>
            <div class="grey lighten-5">
                <v-container>
                    <router-view no-select :data-session="session"/>
                </v-container>
            </div>
        </v-main>
    </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            loading: false,
            items: [],
            total: 0,
            show: true,
        }
    },
    computed: {
        ...mapState({}),
        ...mapGetters({
            session: 'prasarana/getSession',
        }),
        exists(){
            return this.total > 0
        }
    },
    watch: {
        '$route.name': function(val){
            if(val == 'prasarana'){
                this.show = true
            }
        },
        session(){
            this.loadItems()
        }
    },
    methods: {
        ...mapMutations({
            showTambahDialog: 'prasarana/SET_MODAL_TAMBAH',
        }),
        ...mapActions({
            showUbahDialog: 'prasarana/setModalUbah',
            showHapusDialog: 'prasarana/setModalHapus',
            getItems: 'prasarana/get',
            updateSession: 'prasarana/updateSession'
        }),
        openModalTambah(){
            this.showTambahDialog(true)
        },
        ubahInfoPrasarana(id){
            this.showUbahDialog({id, value: true})
        },
        hapusInfoPrasarana(id){
            this.showHapusDialog({id, value: true})
        },
        async loadItems(){
            this.loading = true
            let res = await this.getItems({
                itemsPerPage: 2,
                sortBy: ['created_at'],
                sortDesc: [true],
            }).catch(e => {
                console.log("loadItem@PrasaranaIndex.vue", e);
            });
            this.loading = false
            if(res?.data?.data){
                this.items = res.data.data;
                this.total = res?.data?.meta?.total || 0;
            }
        }
    },
    created(){
        this.loadItems()
    }
}
</script>