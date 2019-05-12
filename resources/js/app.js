window.Vue = require('vue');

//window.axios = require('axios');

import AppLayout from './components/appLayout.vue'
import router from './router/routes'
import axios from 'axios'
import VueSwal from 'vue-swal';
import VueHtmlToPaper from 'vue-html-to-paper';
import VueApexCharts from 'vue-apexcharts'

window.axios = axios.create()

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('vue-spinner', require('vue-simple-spinner'));
Vue.component('apexchart', VueApexCharts)

Vue.use(VueSwal)
Vue.use(VueApexCharts)

Vue.use(VueHtmlToPaper, {
    name: '_blank',
    specs: [
        'fullscreen=yes',
        'titlebar=yes',
        'scrollbars=yes'
    ],
    styles: [
        '/css/app.css',
    ],
});


const app = new Vue({
    el: '#app',
    components: {
        AppLayout,
    },
    router
    
});