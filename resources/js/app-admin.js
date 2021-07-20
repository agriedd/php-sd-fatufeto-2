require('./bootstrap-admin');

import router from './routes/web'

window.Vue = require('vue');

Vue.component('panel-admin', require('./components/PanelAdmin.vue').default);

const app = new Vue({
    el: '#app',
    router,
});
