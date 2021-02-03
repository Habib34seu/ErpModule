import Vue from 'vue';
import routes from "./router/all-router";
require('./bootstrap');


Vue.component('dashbord', require('./components/dashbord.vue').default);
Vue.component('country', require('./components/country/allCountry'));

const app = new Vue({
    el: '#app',
    router:routes
});
