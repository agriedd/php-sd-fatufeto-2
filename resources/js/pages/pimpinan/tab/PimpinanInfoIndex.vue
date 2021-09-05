<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-mail</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Email
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.email }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item @click="resetPasswordPimpinan" link>
                <v-list-item-icon>
                    <v-icon>mdi-key</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title class="">
                        Reset Sandi
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Reset kata sandi guru menjadi kata sandi default 
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                    <v-icon>mdi-chevron-right</v-icon>
                </v-list-item-action>
            </v-list-item>
            <v-divider inset/>

            <v-list-item>
                <v-list-item-icon>
                    <v-icon></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Jabatan
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.jabatan }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Pangkat
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.pangkat }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Golongan
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.golongan }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Status
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.status }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-divider inset/>
            <v-list-item link>
                <v-list-item-icon>
                    <v-icon>mdi-school</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Pendidikan Terakhir
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.pendidikan_terakhir }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item link>
                <v-list-item-icon>
                    <v-icon>mdi-school</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Pendidikan Profesi
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.pendidikan_profesi }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-card-text>
    </v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        item: Object
    },
    computed: {
        /**
         * get id from params id_pimpinan
         * 
         */
        id: function () {
            return this.$route.params.id_pimpinan
        }
    },
    methods: {
        ...mapActions({
            resetPassword: 'pimpinan/password/reset',
        }),
        async resetPasswordPimpinan() {
            /**
             * confirm before execute code bellow
             * 
             */
            if (confirm('Yakin akan mereset sandi pimpinan ini?')) {
                // this.loading = true
                let res = await this.resetPassword({ data: new FormData(), id: this.id }).catch(e => {
                    console.log("resetPimpinan@PimpinanInfoIndex.vue", e)
                    this.notif({
                        message: e.message
                    })
                })
                // this.loading = false
                if(res){
                    this.notif({
                        message: `Berhasil mereset kata sandi pimpinan ${item.nama}`
                    })
                }
            }
        }
    }
}
</script>