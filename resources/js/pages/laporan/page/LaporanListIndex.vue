<template>
    <div class="pa-md-3">
        <v-card color="white" rounded="xl" class="mb-3 shadow-sm">
            <v-breadcrumbs :items="breadcrumb"></v-breadcrumbs>
        </v-card>
        <v-card class="shadow-sm" rounded="xl">
            <v-card-text>
                <div class="d-grid-sekolah w-100">
                    <v-card link color="indigo" dark class="shadow-sm" rounded="xl" :href="rekap_siswa" target="blank">
                        <v-card-text class="content-middle">
                            <v-icon x-large>mdi-download</v-icon>
                            <div class="text-center px-10 pt-4">
                                Unduh Rekap Siswa Tahun {{ tahun }}
                            </div>
                        </v-card-text>
                    </v-card>
                    <v-card link color="teal" dark class="shadow-sm" rounded="xl" :href="rekap_guru" target="blank">
                        <v-card-text class="content-middle">
                            <v-icon x-large>mdi-download</v-icon>
                            <div class="text-center px-10 pt-4">
                                Unduh Rekap Guru Tahun {{ tahun }}
                            </div>
                        </v-card-text>
                    </v-card>
                    <v-card link color="yellow" class="shadow-sm" rounded="xl" :href="rekap_jadwal" target="blank">
                        <v-card-text class="content-middle">
                            <v-icon x-large>mdi-download</v-icon>
                            <div class="text-center px-10 pt-4">
                                Unduh Jadwal Pelajaran Tahun {{ tahun }}
                            </div>
                        </v-card-text>
                    </v-card>
                </div>
            </v-card-text>
            <slot v-bind:update="update"></slot>
        </v-card>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        dataSession: String|Number,
        params: Object,
        small: Boolean,
        noSelect: Boolean,
    },
    components: {
    },
    data(){
        return {
            breadcrumb: [
                {
                    text: 'Panel Admin',
                    disabled: false,
                    to: {name: 'admin'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'Laporan',
                    disabled: false,
                    to: {name: 'laporan'},
                    link: true,
                    exact: true,
                },
                {
                    text: 'List Laporan',
                    disabled: true,
                },
            ],
            items: [],
            selected: [],
            total: 0,
            search: '',
            loading: false,
            view: 'table',
            snackbar: {
                status: true,
                message: "Error!",
            },
            lazyTransition: null,
            tahun: '',
        }
    },
    computed: {
        rekap_siswa(){
            return `/print/rekap/siswa`
        },
        rekap_guru(){
            return `/print/rekap/guru`
        },
        rekap_jadwal(){
            return `/print/rekap/jadwal`
        },
    },
    methods: {
        ...mapActions({
        }),
    },
    watch: {
    },
    created(){
        this.tahun = new Date().getFullYear()
    }
}
</script>