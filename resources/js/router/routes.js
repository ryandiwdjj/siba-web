import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//const HomeAdmin = Vue.component('HomeAdmin',require('./components/start/homeAdmin.vue'));
import HomeAdmin from '../components/admin/homeAdmin.vue'
import AdminJasaService from '../components/admin/AdminJasaService.vue'

const routes = [
    {
        path: '/',
        component: HomeAdmin,
        children : [
            {
                path:'/jasa_service',
                component: AdminJasaService
            }
        ]
    }
]

const router = new VueRouter({mode: 'history', routes: routes});
export default router