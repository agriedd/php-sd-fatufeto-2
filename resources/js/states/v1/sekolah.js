import axios from 'axios'

import { api } from './config'

export default {
    namespaced: true,
    
    state: {
        items: [],
        user: {},
        selected: {
            id:     null,
            ids:    [],
            item:   null,
            items:  []
        },
        modal: {
            tambah: false,
            ubah: false,
            hapus: false,
            info: false,
        },
        errors: {},
        session: {
            code: 0
        }
    },
    getters: {
        getTotal(state){
            return state.items.length
        }
    },
    actions: {
        get(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('v1/sekolah'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        count(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('v1/analytic/sekolah/count'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async show(context, {data = {}, id}){
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.get(api(`v1/sekolah/${id}`), { params: data }).catch(e => reject(e))
                    if(res) resolve(res)
                })
            else
                console.warn("show@sekolah.js", "id kosong 🤦‍♂️");
        },
        store(context, data){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(api('v1/sekolah'), data).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async update(context, { data, id }){
            if(id){
                if(data instanceof FormData)
                    data.append('_method', 'PUT')
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`v1/sekolah/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
            }
            else
                console.warn("update@sekolah.js", "id kosong 🤦‍♂️");
        },
        async destroy(context, data){
            let id = context.state.selected.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`v1/sekolah/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
        updateSession(context, data){
            context.commit('SET_SESSION_CODE', data || (new Date).getTime())
        },

        /**
         * modal
         * 
         */
        openModalUbah(context, id){
            context.commit('PUSH_ID', id)
            context.commit('SET_MODAL_UBAH', true)
        },
        closeModalUbah(context, id){
            context.commit('POP_ID', id)
            context.commit('SET_MODAL_UBAH', false)
        }
    },
    mutations: {
        SET_MODAL_TAMBAH(state, payload){
            state.modal.tambah = payload
        },
        SET_MODAL_UBAH(state, payload){
            state.modal.ubah = payload
        },
        SET_MODAL_HAPUS(state, payload){
            state.modal.hapus = payload
        },
        SET_MODAL_INFO(state, payload){
            state.modal.info = payload
        },
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
        PUSH_ID(state, payload){
            state.selected.id = payload
            state.selected.ids.push(payload)
        },
        POP_ID(state, payload){
            state.selected.id = null
            state.selected.ids.pop()
        },
        SET_ITEMS(state, payload){
            state.items = payload
        },
        SET_SESSION_CODE(state, payload){
            state.session.code = payload
        }
    },
}