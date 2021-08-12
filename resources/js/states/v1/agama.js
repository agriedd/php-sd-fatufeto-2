import axios from 'axios'
import { api, host, csrf } from './config'
export default {
	namespaced: true,
	state: {
		items: [
			{
				text: 'Islam',
				value: '0',
			},
			{
				text: 'Kristen Protestan',
				value: '1',
			},
			{
				text: 'Kristen Katolik',
				value: '2',
			},
			{
				text: 'Hindu',
				value: '3',
			},
			{
				text: 'Budha',
				value: '4',
			},
			{
				text: 'Khonguchu',
				value: '5',
			},
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