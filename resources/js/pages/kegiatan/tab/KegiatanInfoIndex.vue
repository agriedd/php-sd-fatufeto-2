<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>
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
export default {
    props: {
        item: Object
    }
}
</script>