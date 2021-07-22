import axios from 'axios'
import { api, host, csrf } from './config'
export default {
	namespaced: true,
	state: {
	},
	getters: {
	},
	actions: {
	},
	mutations: {
	},
	modules: {
		admin: {
			namespaced: true,
			state: {
				data		: [],
				user		: {},
				selected	: {
					id		: null,
					ids		: [],
					data	: null,
					datas	: []
				},
				modal		: {
					logout	: false,
				},
				errors		: {},
				session		: {
					code: 0
				}
			},
			getters: {
				getUser(state){
					return state.user
				},
				exists(state){
					let exists = false
					if(state.user.id)
						exists = true
					return exists
				}
			},
			actions: {
				check(context, { token = null }){
					return new Promise(async(resolve, reject)=>{
						let res = await axios.post(api('v1/user/authorize'), {}, { headers: { Authorization: `Bearer ${token}` } }).catch(e => reject(e))
						if(res) resolve(res)
					})
				},
				logout(context, data){
					return new Promise(async(resolve, reject)=>{
						let res = await axios.post(host('logout'), {}, { headers: {
							'X-CSRF-TOKEN': csrf
						} }).catch(e => reject(e))
						if(res) resolve(res)
					})
				},
				updateSession(context, data){
					context.commit('SET_SESSION_CODE', data || (new Date).getTime())
				},
			},
			mutations: {
				SET_ERRORS(state, payload){
					state.errors = payload
				},
				CLEAR_ERROR(state, payload){
					state.errors[payload] = null
				},
				CLEAR_ERRORS(state, payload){
					state.errors = {}
				},
				SET_ID(state, payload){
					state.selected.id = payload
				},
				SET_USER(state, payload){
					state.user = payload
				},
				SET_SESSION_CODE(state, payload){
					state.session.code = payload
				},
				SET_LOGOUT_MODAL(state, payload){
					state.modal.logout = payload
				}
			},
		}
	}
}