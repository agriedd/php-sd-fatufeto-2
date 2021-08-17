<template>
    <div>
        <v-app-bar title="Panel Admin" app flat floating>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </v-app-bar>
        <v-main>
            <div class="d-grid-dashboard pa-3">
                <grid-sekolah/>
            </div>
        </v-main>
    </div>
</template>
<script>
import GridSekolah from '../components/grid/GridSekolah.vue'
export default {
  components: { GridSekolah },
    
}
</script>