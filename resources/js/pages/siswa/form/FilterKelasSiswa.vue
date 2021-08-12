<template>
	<v-card rounded="xl" color="grey lighten-5" flat class="w-100">
		<v-card-text class="pb-0">
			<v-text-field
				dense
				placeholder="search"
				rounded
				v-model="search"/>
		</v-card-text>
		<v-scale-transition leave-absolute group tag="div" class="d-flex flex-nowrap overflow-auto pa-4" mode="out-in">
			<div class="pr-3" key="prev">
				<v-card rounded="xl" class="shadow-sm item-hari overflow-hidden" link @click="prevClass()">
					<div class="d-flex flex-column justify-center fill-height">
						<v-icon>mdi-chevron-left</v-icon>
					</div>
				</v-card>
			</div>
			<div class="pr-3" v-for="item in items" :key="item.id_kelas">
				<v-card rounded="xl" class="shadow-sm item-hari" :color="item.id_kelas == selected.id ? 'indigo' : null" :dark="item.id_kelas == selected.id" @click="selectClass(item)">
					<div class="d-flex flex-column justify-center fill-height">
						<v-card-text class="py-0 text-center" :class="[ item.id_kelas != selected.id ? 'text--disabled' : null ]">
							{{ item.nama }} ({{ item.siswa_count | number }})
						</v-card-text>
						<v-card-text class="text-center py-0">
							{{ item.guru.nama }}
						</v-card-text>
					</div>
				</v-card>
			</div>
			<div class="pr-3" key="next">
				<v-card rounded="xl" class="shadow-sm item-hari overflow-hidden" link @click="nextClass()">
					<div class="d-flex flex-column justify-center fill-height">
						<v-icon>mdi-chevron-right</v-icon>
					</div>
				</v-card>
			</div>
		</v-scale-transition>
	</v-card>
</template>
<script>
import moment from 'moment'
import { mapActions, mapMutations } from 'vuex'
export default {
	props: {
		range: {
			type: Number,
			default: 3
		}
	},
	data(){
		return {
			items_temp: [],
			selected: {
				id: null,
				index: 1,
			},
			handler: null,
			loading: false,
			search: '',
		}
	},
	computed: {
		midrange(){
			return parseInt(this.range / 2)
		},
		items_temp_filter(){
			return this.items_temp.filter(item => {
				return item.nama.toLowerCase().indexOf(this.search.toLowerCase()) !== -1
			})
		},
		items(){
			let items = []
			// let selected = this.items_temp.find(e => e.id_kelas == this.selected.id)
			let first_item_index = this.selected.index - this.midrange
			first_item_index = first_item_index <= 0 ? 0 : first_item_index
			// let first_item = this.items_temp[first_item_index]
			for(let i = first_item_index; i < (first_item_index + this.range); i++){
				if(this.items_temp_filter[i])
					items.push(this.items_temp_filter[i])
			}
			return items
		}
	},
	methods: {
		...mapActions({
			getItems: 'kelas/get'
		}),
		nextClass(add = 1){
			/**
			 * jika index terpilih + 1 tidak melebihi jumlah item
			 * maka index terpilih di-increment
			 * 
			 * item.length = 2
			 * index + 1 harus 0, 1; harus dibawah atau sama dengan 2 - 1
			 * 
			 */
			if(this.selected.index + add <= this.items_temp_filter.length - 1)
				this.selected.index = this.selected.index + add
			else this.selected.index = this.selected.index
			
			if(this.selected.id != null){
				this.selected.id = this.items_temp_filter[this.selected.index].id_kelas
			}
		},
		prevClass(sub = 1){
			/**
			 * jika index terpilih - 1 tidak kurang dari 0
			 * maka index terpilih di-decrement
			 * 
			 * item.min = 0
			 * index - 1 harus 0, 1; harus diatas atau sama dengan 0
			 * 
			 */
			if(this.selected.index - sub >= 0)
				this.selected.index = this.selected.index - sub
			else this.selected.index = this.selected.index

			if(this.selected.id != null){
				this.selected.id = this.items_temp_filter[this.selected.index].id_kelas
			}
		},
		selectClass(item){
			if(item.id_kelas == this.selected.id){
				this.selected.id = null
			} else {
				this.selected.id = item.id_kelas
				let index = this.items_temp_filter.findIndex(e => e.id_kelas == item.id_kelas)
				this.selected.index = index
			}
		},
		async loadItems(){
			this.loading = true
			let res = await this.getItems({
				itemsPerPage: 100
			}).catch(err => {})
			this.loading = false
			if(res)
				this.items_temp = res.data?.data
		}
	},
	watch: {
		selected: {
			deep: true,
			handler(val){
				if(this.handler)
					clearTimeout(this.handler)
				this.handler = setTimeout(e => {
					if(this.selected.id != null){
						this.$emit('selected', this.selected.id)
					} else {
						this.$emit('selected', null)
					}
				}, 800)
			}
		},
	},
	created(){
		this.loadItems()
	}
}
</script>
<style lang="scss" scoped>
	.item-hari{
		height: 100px;
		width: 100%;
		min-width: 150px;
		max-width: 150px;
	}
</style>