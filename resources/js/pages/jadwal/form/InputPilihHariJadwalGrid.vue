<template>
	<v-card rounded="xl" color="grey lighten-5" flat class="w-100">
		<v-scale-transition leave-absolute group tag="div" class="d-flex flex-nowrap overflow-auto pa-4" mode="out-in">
			<div class="pr-3" key="prev">
				<v-card rounded="xl" class="shadow-sm item-hari overflow-hidden" link @click="prevDate()">
					<div class="d-flex flex-column justify-center fill-height">
						<v-icon>mdi-chevron-left</v-icon>
					</div>
				</v-card>
			</div>
			<div class="pr-3" v-for="item in items" :key="item.time">
				<v-card rounded="xl" class="shadow-sm item-hari" :color="item.time == selected ? 'indigo' : null" :dark="item.time == selected" @click="selectDate(item)">
					<div class="d-flex flex-column justify-center fill-height">
						<v-card-text class="py-0 text-center" :class="[ item.libur != null && item.libur && item.time != selected ? 'text--disabled' : null ]">
							{{ item.label }}
						</v-card-text>
						<v-card-text class="text-center text-h5 py-0" :class="[ item.libur != null && item.libur ? 'error--text' : null ]">
							{{ item.date }}
						</v-card-text>
						<v-card-text class="text-center py-0" :class="[ item.libur != null && item.libur && item.time != selected ? 'text--disabled' : null ]">
							{{ item.month }}
						</v-card-text>
					</div>
				</v-card>
			</div>
			<div class="pr-3" key="next">
				<v-card rounded="xl" class="shadow-sm item-hari overflow-hidden" link @click="nextDate()">
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
import { mapMutations } from 'vuex'
export default {
	data(){
		return {
			items_temp: [
				{ value: 'senin', label: 'Senin', mingguan: true, weekday: 1, month: 'Agu', date: '02'},
				{ value: 'selas', label: 'Selasa', mingguan: true, weekday: 1, month: 'Agu', date: '03'},
				{ value: 'rabu', label: 'Rabu', mingguan: true, weekday: 1, month: 'Agu', date: '04'},
				{ value: 'kamis', label: 'Kamis', mingguan: true, weekday: 1, month: 'Agu', date: '05'},
				{ value: 'jumat', label: 'Jumat', mingguan: true, weekday: 1, month: 'Agu', date: '06'},
				{ value: 'sabtu', label: 'Sabtu', mingguan: true, weekday: 1, month: 'Agu', date: '07'},
				{ value: 'minggu', label: 'Minggu', mingguan: true, weekday: 1, month: 'Agu', date: '08', libur: true},
			],
			selected: 0,
			range: 7,
			handler: null
		}
	},
	computed: {
		midrange(){
			return parseInt(this.range / 2)
		},
		items(){
			let items = []
			let selected = moment(this.selected)
			let first_item = selected.subtract(this.midrange + 1, 'day')
			let item = first_item
			for(let i = 0; i < this.range; i++){
				item.add(1, 'day')
				item.locale('id-ID')
				items.push({
					time: item.valueOf(),
					value: item.format('d'), label: item.format('dddd'), month: item.format('MMM'), date: item.format('DD'),
					libur: item.format('d') == 0
				})
			}
			return items
		}
	},
	methods: {
		...mapMutations({
			selectDay: 'jadwal/options/SET_HARI'
		}),
		nextDate(add = 1){
			this.selected = moment(this.selected).add(add, 'day').valueOf()
		},
		prevDate(sub = 1){
			this.selected = moment(this.selected).subtract(sub, 'day').valueOf()
		},
		selectDate(date){
			this.selected = date.time
		},
	},
	watch: {
		selected(val){
			if(this.handler)
				clearTimeout(this.handler)
			this.handler = setTimeout(e => {
				let day = moment(val).locale('id-ID').format('dddd')
				this.$emit('selected', day)
				this.selectDay(day)
			}, 800)
		}
	},
	created(){
		this.selected = Date.now()
		window.m = moment
	}
}
</script>
<style lang="scss" scoped>
	.item-hari{
		height: 100px;
		width: 100%;
		min-width: 80px;
		max-width: 80px;
	}
</style>