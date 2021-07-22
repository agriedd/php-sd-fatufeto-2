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
        async show(context, params){
            let id = params.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.get(api(`v1/sekolah/${id}`), { params: params }).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
        store(context, data){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(api('v1/sekolah'), data).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async update(context, data){
            let id = context.state.selected.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`v1/sekolah/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
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
        SET_ITEMS(state, payload){
            state.items = payload
        },
        SET_SESSION_CODE(state, payload){
            state.session.code = payload
        }
    },
}