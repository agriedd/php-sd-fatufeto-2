<template>
	<v-menu content-class="shadow" max-width="300" min-width="300" overlay-opacity=".25" scrollable open-on-click open-on-focus :close-on-content-click="false">
		<template #activator="{ on, attrs }">
			<v-text-field
				dense
				outlined
				v-model="waktu_berakhir"
				name="waktu_berakhir"
				label="Waktu Berakhir"
				:error-messages="errors.waktu_berakhir"
				@keyup="errors.waktu_berakhir = null"
				readonly
				v-bind="attrs"
				v-on="on"/>
		</template>
		<v-card>
			<v-card-text class="pa-0">
				<v-time-picker
					ampm-in-title
					format="24hr"
					scrollable
					full-width
					v-model="waktu_berakhir"/>
			</v-card-text>
		</v-card>
	</v-menu>
</template>
<script>
export default {
	props: {
		errors: Object,
		value: String|Number
	},
	computed: {
		waktu_berakhir: {
			set(val){
				this.$emit('input', val)
			},
			get(){
				return this.value
			}
		}
	},
	data(){
		return {
			show: false,
		}
	}
}
</script>