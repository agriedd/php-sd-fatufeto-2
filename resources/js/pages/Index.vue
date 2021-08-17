<template>
    <div>
        <v-app-bar title="Panel Admin" app flat floating>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </v-app-bar>
        <v-main>
            <div class="d-grid-dashboard pa-3">
                <v-card flat color="grey lighten-5" rounded="xl" v-for="i in 10" :key="i">
                    <v-card-text>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur, itaque tempora. Minima eum expedita, hic voluptas totam reiciendis, quidem ex adipisci cum possimus incidunt ratione ad tenetur voluptatem quis dolor.
                    </v-card-text>
                </v-card>
            </div>
        </v-main>
    </div>
</template>
<script>
export default {
    
}
</script>