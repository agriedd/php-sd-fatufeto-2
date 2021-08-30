<template>
	<v-main>
		<v-app-bar flat color="primary" dark extended extension-height="300">
			<v-app-bar-nav-icon/>
			<v-app-bar-title>
				Dashboard Guru
			</v-app-bar-title>
		</v-app-bar>
		<v-container>
			<div style="margin-top: -300px">
				<v-card class="mb-2">
					<v-card-text>
						<div class="d-flex">
							<v-avatar>
								<img src="https://cdn.vuetifyjs.com/images/lists/1.jpg">
							</v-avatar>
							<div class="d-flex flex-column ml-3">
								<h4 class="font-weight-bold mb-0">{{ user.name }}</h4>
								<small class="text-muted">{{ user.email }}</small>
							</div>
						</div>
					</v-card-text>
				</v-card>
				<info-walikelas-guru/>
			</div>
		</v-container>
	</v-main>
</template>
<script>
import InfoWalikelasGuru from '../../../components/dashboard/guru/kelas/InfoWalikelasGuru.vue'
export default {
  	components: { InfoWalikelasGuru },
	data () {
		return {
			user: {
				name: 'Lorem Ipsum.',
				email: 'guru@sdfatufeto.sch.id'
			},
			guru: {
				count: 49
			}
		}
	}
}
</script>