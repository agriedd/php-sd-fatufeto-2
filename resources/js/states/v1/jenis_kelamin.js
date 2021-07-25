import axios from 'axios'
import { api, host, csrf } from './config'
export default {
	namespaced: true,
	state: {
		items: [
			{
				text: 'Laki-Laki',
				value: 'l',
			},
			{
				text: 'Perempuan',
				value: 'p',
			}
		]
	},
	getters: {
	},
	actions: {
	},
	mutations: {
	},
	modules: {
	}
}