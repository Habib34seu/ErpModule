import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Dashbord from '../components/dashbord.vue';
const routes = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/',
            component:Dashbord
        }
    ]
});
export default routes;
