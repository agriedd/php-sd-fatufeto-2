require('./bootstrap-admin');
import Vue from 'vue';
import Vuetify from 'vuetify';

import 'vuetify/dist/vuetify.min.css'
import colors from 'vuetify/lib/util/colors'

import router from './routes/web'

window.Vue = Vue
Vue.use(Vuetify)
let vuetify = new Vuetify({})

Vue.component('panel-admin', require('./components/PanelAdmin.vue').default);

const app = new Vue({
    el: '#app',
    router,
    vuetify,
});
