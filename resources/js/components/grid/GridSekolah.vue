<template>
	<v-card flat rounded="xl">
		<v-card-text v-if="!item.id_profil" class="content-middle">
			Profil Sekolah kosong :(
		</v-card-text>
		<template v-else>
			<v-card-text>
				<div class="d-flex w-100">
					<v-avatar color="grey lighten-2" v-if="i == 0">
						<v-icon>mdi-pin</v-icon>
					</v-avatar>
					<v-spacer/>
					<v-btn icon :to="{ name: 'sekolah.show', params: { id_profil: item.id_profil } }" link>
						<v-icon>mdi-chevron-right</v-icon>
					</v-btn>
				</div>
			</v-card-text>
			<v-card-title>
				{{ item.nama_sekolah }}
			</v-card-title>
			<v-card-subtitle>
				{{ item.tgl_berdiri }}
			</v-card-subtitle>
			<v-spacer/>
			<v-card-text>
				<div>
					{{ item.alamat }}
				</div>
				<div>
					NPSN. {{ item.npsn }}
				</div>
			</v-card-text>
		</template>
	</v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
	data(){
		return {
			item: {},
		}
	},
	methods: {
		...mapActions({
			getItem: 'sekolah/get',
		}),
		async loadItem(){
			let res = await this.getItem({
				itemsPerPage: 1,
			}).catch(err => {
				console.error(err)
			})
			if(res){
				this.item = res.data?.data?.[0]
			}
		},
	},
	created(){
		this.loadItem()
	},
}
</script>