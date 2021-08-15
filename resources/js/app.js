require('./bootstrap');
import Vue from 'vue'
window.Vue = Vue

import Vuex from 'vuex'
import states from './states/app-states'
/**
 * konfigurasi vuex state
 * 
 */
Vue.use(Vuex)
const store = new Vuex.Store( { modules: states } )

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('login-panel', require('./components/LoginPanel.vue').default);
Vue.component('list-siswa', require('./components/public/siswa/ListSiswa.vue').default);

const app = new Vue({
    el: '#app',
    store,
    data() {
        return {
            search: '',
        }
    },
    methods: {

    }
});
