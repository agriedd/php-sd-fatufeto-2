<template>
	<div>
		<v-card>
			<v-tabs>
				<v-tab>Kelas</v-tab>
				<v-tab>Siswa</v-tab>
			</v-tabs>
			<v-divider></v-divider>
			<v-card-text>
				<div class="d-flex justify-start">
					<v-alert rounded="xl" text prominent type="info" max-width="500" class="mb-0">
						Selamat datang {{ user.nama }}, silahkan gunakan navigasi pada tab untuk melihat
						info kelas dan siswa, gunakan navigasi di bagian kiri untuk menjelajah halaman.
					</v-alert>
				</div>
			</v-card-text>
			<v-card-text>
				<guru-kelas-index/>
			</v-card-text>
		</v-card>
	</div>
</template>
<script>
import GuruKelasIndex from '../../../../pages/guru/tab/GuruKelasIndex.vue'
export default {
  	components: { GuruKelasIndex },
	data() {
		return {
			user: {
				nama: '',
				email: '',
				foto: '',
				role: '',
				id: ''
			}
		}
	},
}
</script>