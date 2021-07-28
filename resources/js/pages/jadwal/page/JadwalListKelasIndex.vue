<template>
    <div>
        <v-card flat rounded="xl" color="blue lighten-5" class="mb-6">
            <v-card-text class="content-middle">
                <div class="mb-3">
                    <v-icon color="blue lighten-3" x-large>mdi-information</v-icon>
                </div>
                <div>
                    Silahkan memilih Kelas di bawah terlebih dahulu 
                </div>
            </v-card-text>
        </v-card>
        <input-pilih-kelas-jadwal-grid/>
    </div>
</template>
<script>
import { mapMutations } from 'vuex'
import InputPilihKelasJadwalGrid from '../form/InputPilihKelasJadwalGrid.vue'
export default {
    components: { InputPilihKelasJadwalGrid },
    methods: {},
    created(){
    }
}
</script>