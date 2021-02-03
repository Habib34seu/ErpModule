import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Dashbord from '../components/dashbord.vue';
import Country from '../components/country/allCountry';
const routes = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/',
            component:Dashbord
        },
        {
            path:'/country',
            component:Country
        }
    ]
});
export default routes;
