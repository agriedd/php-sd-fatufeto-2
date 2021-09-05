import Vue from 'vue'
import Vuex from 'vuex'
import Router from 'vue-router'
import VueRouter from 'vue-router'
import routes from './routes-pimpinan'
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
        return Promise.reject(error);
    });

    if(to.path == '/admin/401') return next()

    let token = localStorage.getItem('authToken')
    let res = await store.dispatch('login/pimpinan/check', {
        token
    })
    if(res.status == 200 && res?.data?.data){
        store.commit('login/pimpinan/SET_USER', res.data.data)
        if(store.state.login.pimpinan.user){
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