<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <div class="content-middle pa-5 align-start" v-if="item.foto && item.foto.url">
            <v-img :src="item.foto.url" :aspect-ratio="1/1" class="rounded-xl shadow" max-height="200" max-width="200" width="100%" height="100%"/>
        </div>
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
            <v-list-item @click="resetPasswordGuru" link>
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
            <!-- <v-list-item>
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
            </v-list-item> -->
            <v-list-item>
                <v-list-item-icon>
                    <v-icon></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Status
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.status == '1' ? 'Aktif' : 'Tidak Aktif' }}
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
         * get id from params id_guru
         * 
         */
        id: function () {
            return this.$route.params.id_guru
        }
    },
    methods: {
        ...mapActions({
            resetPassword: 'guru/password/reset',
        }),
        async resetPasswordGuru() {
            /**
             * confirm before execute code bellow
             * 
             */
            if (confirm('Yakin akan mereset sandi guru ini?')) {
                // this.loading = true
                let res = await this.resetPassword({ data: new FormData(), id: this.id }).catch(e => {
                    console.log("resetGuru@GuruInfoIndex.vue", e)
                    this.notif({
                        message: e.message
                    })
                })
                // this.loading = false
                if(res){
                    this.notif({
                        message: `Berhasil mereset kata sandi guru ${item.nama}`
                    })
                }
            }
        }
    }
}
</script>