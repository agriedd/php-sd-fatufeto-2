require('./bootstrap-admin');
import Vue from 'vue';
import Vuetify from 'vuetify';

import 'vuetify/dist/vuetify.min.css'
import colors from 'vuetify/lib/util/colors'
import router from './routes/web'
// import * as VueGoogleMaps from 'vue2-google-maps'

// Vue.use(VueGoogleMaps, {
//   load: {
//     key: 'AIzaSyBWopilYZbUSAKPyaLJpYNqSgM45H6aOhY',
//     libraries: 'places', // This is required if you use the Autocomplete plugin
//     // OR: libraries: 'places,drawing'
//     // OR: libraries: 'places,drawing,visualization'
//     // (as you require)

//     //// If you want to set the version, you can do so:
//     // v: '3.26',
//   },

//   //// If you intend to programmatically custom event listener code
//   //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
//   //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
//   //// you might need to turn this on.
//   // autobindAllEvents: false,

//   //// If you want to manually install components, e.g.
//   //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
//   //// Vue.component('GmapMarker', GmapMarker)
//   //// then set installComponents to 'false'.
//   //// If you want to automatically install all the components this property must be set to 'true':
//   installComponents: true
// })

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
        time(val, local = 'id-ID'){
            let date = new Date(`2020-01-01 ${val}`);
            return new Intl.DateTimeFormat(local, { hour: '2-digit', minute: '2-digit' }).format(date)
        },
        date(val, local = 'id-ID'){
            let date = new Date(val);
            return new Intl.DateTimeFormat(local, { year: 'numeric', month: 'long', day: 'numeric' }).format(date)
        },
        number(val, local = 'id-ID'){
            return new Intl.NumberFormat(local, {}).format(val)
        },
        sub(val, end){
            return val.substring(0, end)
        },
        agama(val){
            switch(val){
                case '0':
                    return 'Islam';
                case '1':
                    return 'Kristen';
                case '2':
                    return 'Katholik';
                case '3':
                    return 'Hindu';
                case '4':
                    return 'Budha';
                case '5':
                    return 'Konghuchu';
                case '6':
                default:
                    return '-'
            }
        },
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
