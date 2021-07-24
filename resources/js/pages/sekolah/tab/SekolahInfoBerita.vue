<template>
    <v-card flat>
        <v-card-title id="visi-misi">
            Berita
        </v-card-title>
        <v-card-text>
            <v-skeleton-loader type="card@3"></v-skeleton-loader>
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