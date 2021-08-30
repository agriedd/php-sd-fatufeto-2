import Vue from 'vue'
import Vuex from 'vuex'
import Router from 'vue-router'
import VueRouter from 'vue-router'
import routes from './routes-guru'
/**
 * @todo ganti states dengan vuex milik guru
 * 
 */
import store from '../states/vuex-admin'
import axios from 'axios'

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

router.beforeEach(async (to, from, next) => {
    /**
     * konfigurasi
     * konfigurasi axios
     * 
     */
    next()
    axios.interceptors.response.use(function (response) {
        if(response.config.category == 'DELETE' && response.status == 204){
            store.dispatch('notifikasi/show', {
                message: "Berhasil menghapus data 👌"
            })
        }
        if(response.status == 201){
            store.dispatch('notifikasi/show', {
                message: "Berhasil menyimpan data 👌"
            })
        }
        return response;
    }, function (error) {
        // if(error.response.status == 401){
        //     localStorage.removeItem('authToken')
        //     // store.commit('app/SET_LOADING_APP', false)
        //     if(to.path == '/admin/401'){
        //         return null
        //     }
        //     next({ path: '/admin/401' })
        //     return null
        // } else if(error.response.status == 403){
        //     store.dispatch('notifikasi/show', {
        //         message: error.message
        //     })
        // }
        return Promise.reject(error);
    });

    // store.commit('SETLOADINGAPP', true)

    if(to.path == '/admin/401') return next()

    let token = localStorage.getItem('authToken')
    let res = await store.dispatch('login/guru/check', {
        token
    })
    if(res.status == 200 && res?.data?.data){
        store.commit('login/guru/SET_USER', res.data.data)
        if(store.state.login.guru.user){
            return next()
        }
    }
    next({
        path: '/admin/403'
    })
})

router.afterEach(async (to, from, next) => {
    // setTimeout(()=>{
    //     store.commit('SETLOADINGAPP', false)
    // }, 500)
})

export default router