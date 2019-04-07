

require('./bootstrap');

import AppLayout from './components/appLayout.vue'
import Buefy from 'buefy';
import VueRouter from 'vue-router';
import router from './router/routes';

window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
Vue.use(Buefy,{defaultIconPack: 'fa'}, VueRouter, axios);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);


const app = new Vue({
    el: '#app',
    components: {
        AppLayout,
    },
    router
});
