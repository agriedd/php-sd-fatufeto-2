<template>
    <v-card flat>
        <v-card-title id="visi-misi">
            Visi Misi
        </v-card-title>
        <v-card-text>
            <v-list>
                <v-subheader>
                    # Visi
                </v-subheader>
                <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat v-for="(visi, i) in item.visi_misi.visi" :key="`visi-${i}`" v-show="visi.trim().length" class="mb-3">
                    <v-card-text>
                        {{ visi }}
                    </v-card-text>
                </v-card>
                <v-subheader>
                    # Misi
                </v-subheader>
                <v-card color="grey lighten-4 overflow-hidden" rounded="xl" flat v-for="(misi, i) in item.visi_misi.misi" :key="`misi-${i}`" v-show="misi.trim().length" class="mb-3">
                    <v-card-text>
                        {{ misi }}
                    </v-card-text>
                </v-card>
            </v-list>
        </v-card-text>
        <v-card-title id="visi-misi">
            Struktur Organisasi
        </v-card-title>
        <v-card-text>
            <v-img :src="item.struktur_organisasi" class="rounded-xl" @click="previewImage(item.struktur_organisasi)"></v-img>
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