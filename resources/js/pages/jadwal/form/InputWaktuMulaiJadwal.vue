<template>
	<v-menu content-class="shadow" max-width="300" min-width="300" overlay-opacity=".25" scrollable open-on-click :close-on-content-click="false">
		<template #activator="{ on, attrs }">
			<v-text-field
				dense
				outlined
				v-model="waktu_mulai"
				name="waktu_mulai"
				label="Waktu Mulai"
				:error-messages="errors.waktu_mulai"
				@keyup="errors.waktu_mulai = null"
				v-bind="attrs"
				v-on="on"
				readonly/>
		</template>
		<v-card>
			<v-card-text class="pa-0">
				<v-time-picker
					ampm-in-title
					format="24hr"
					scrollable
					full-width
					v-model="waktu_mulai"/>
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
		waktu_mulai: {
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