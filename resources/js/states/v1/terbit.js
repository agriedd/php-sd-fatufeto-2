import axios from 'axios'
import { api, host, csrf } from './config'
export default {
	namespaced: true,
	state: {
		items: [
			{
				text: 'Publikasi',
				value: '1',
			},
			{
				text: 'Draft',
				value: '0',
			}
		]
	},
	getters: {
	},
	actions: {
		getText(context, payload){
			let text = context.state.items.find(e => e.value == payload) || "-"
			return text
		}
	},
	mutations: {
	},
	modules: {
	}
}