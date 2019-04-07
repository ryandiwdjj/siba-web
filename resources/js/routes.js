import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const HomeAdmin = Vue.component('HomeAdmin',require('./components/start/homeAdmin.vue'));

const routes = [
    {
        name: HomeAdmin,
        path: '/',
        component: HomeAdmin
    }
]

const router = new VueRouter({mode: 'history', routes: routes});
export default router