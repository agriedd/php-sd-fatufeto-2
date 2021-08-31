<template>
	<div>
		<v-card-text>
			<div class="d-flex justify-start">
				<v-alert text prominent type="info" class="mb-0">
					Selamat datang {{ user.jenis_kelamin == 'l' ? 'Bpk.' : 'Ibu' }}{{ user.nama }}, silahkan gunakan navigasi pada tab untuk melihat
					info kelas dan siswa, gunakan navigasi di bagian kiri untuk menjelajah halaman.
				</v-alert>
			</div>
		</v-card-text>
		<v-card-text>
			<guru-kelas-index :item="user"/>
		</v-card-text>
	</div>
</template>
<script>
import { mapGetters } from 'vuex'
import GuruKelasIndex from '../../../guru/tab/GuruKelasIndex.vue'
export default {
  	components: { GuruKelasIndex },
	computed: {
		...mapGetters({
			user: 'login/guru/getUser'
		}),
	}
}
</script>