<template>
    <div>
        <v-app-bar title="Panel Admin" app flat floating>
            <v-app-bar-nav-icon></v-app-bar-nav-icon>
        </v-app-bar>
        <v-main>
            <div class="d-grid-dashboard pa-3">
                <grid-sekolah/>
                <grid-guru/>
                <grid-berita class="rowspan-2"/>
                <grid-siswa/>
                <grid-kelas/>
                <grid-prasarana/>
                <grid-sarana/>
            </div>
        </v-main>
    </div>
</template>
<script>
import GridBerita from '../components/grid/GridBerita.vue'
import GridGuru from '../components/grid/GridGuru.vue'
import GridKelas from '../components/grid/GridKelas.vue'
import GridPrasarana from '../components/grid/GridPrasarana.vue'
import GridSarana from '../components/grid/GridSarana.vue'
import GridSekolah from '../components/grid/GridSekolah.vue'
import GridSiswa from '../components/grid/GridSiswa.vue'
export default {
  components: { GridSekolah, GridGuru, GridSiswa, GridKelas, GridPrasarana, GridSarana, GridBerita },
    
}
</script>