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

import store from './states/vuex-admin'

Vue.component('panel-admin', require('./components/PanelAdmin.vue').default);

Vue.mixin({
    filters: {
        datetime(val, local = 'id-ID'){
            let date = new Date(val);
            return new Intl.DateTimeFormat(local, { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }).format(date)
        },
        date(val, local = 'id-ID'){
            let date = new Date(val);
            return new Intl.DateTimeFormat(local, { year: 'numeric', month: 'long', day: 'numeric' }).format(date)
        },
        number(val, local = 'id-ID'){
            return new Intl.NumberFormat(local, {}).format(val)
        }
    },
    methods: {
        setErrorForm(e){
            if(e?.response?.data?.errors){
                for(let key in e.response.data.errors){
                    this.$set(this.errors, key, e.response.data.errors[key])
                }
                this.errors = e.response.data.errors
            }
        },
        previewImage(img){
            this.$store.dispatch('image/show', {src: img})
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    store,
});
