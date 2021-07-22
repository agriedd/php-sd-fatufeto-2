require('./bootstrap-admin');
import Vue from 'vue';
import Vuetify from 'vuetify';

import 'vuetify/dist/vuetify.min.css'
import colors from 'vuetify/lib/util/colors'
import router from './routes/web'
/**
 * konfigurasi vuetify
 * 
 */

window.Vue = Vue
Vue.use(Vuetify)
let vuetify = new Vuetify({})

import Vuex from 'vuex'
import states from './states/states'
/**
 * konfigurasi vuex state
 * 
 */
Vue.use(Vuex)
const store = new Vuex.Store( { modules: states } )

Vue.component('panel-admin', require('./components/PanelAdmin.vue').default);

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    store,
});
