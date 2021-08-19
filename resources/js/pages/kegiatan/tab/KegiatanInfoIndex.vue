<template>
    <v-card color="grey lighten-5 overflow-hidden mt-3" rounded="xl" flat>
        <v-card-text>
            <v-list-item>
                <v-list-item-icon>
                    <v-icon>mdi-calendar</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-subtitle>
                        Update pada
                    </v-list-item-subtitle>
                    <v-list-item-title class="">
                        {{ item.updated_at | datetime }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-card-text>
        <v-card-text>
            
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