<template>
	<div>
		<v-card>
			<v-tabs>
				<v-tab :to="{ name: 'dashboard' }">Kelas</v-tab>
				<v-tab :to="{ name: 'siswa' }">Siswa</v-tab>
			</v-tabs>
			<v-divider></v-divider>
			<router-view></router-view>
		</v-card>
	</div>
</template>
<script>
import { mapGetters, mapState } from 'vuex'
import GuruKelasIndex from '../../../../pages/guru/tab/GuruKelasIndex.vue'
export default {
  	components: { GuruKelasIndex },
	data() {
		return {
			
		}
	},
	computed: {
		...mapGetters({
			user: 'login/guru/getUser'
		}),
	}
}
</script>