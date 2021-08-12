<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>
            <v-list-item>
                <v-list-item-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        NISN
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.nisn }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item>
                <v-list-item-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        KIP
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.kip }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item>
                <v-list-item-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Agama
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.agama | agama }}
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