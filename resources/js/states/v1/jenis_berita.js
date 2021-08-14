import axios from 'axios'
import { api, host, csrf } from './config'
export default {
	namespaced: true,
	state: {
		items: [
			{
				text: 'Berita',
				value: 'berita',
			},
			{
				text: 'Pengumuman',
				value: 'pengumuman',
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