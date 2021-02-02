import Vue from 'vue';
import routes from "./router/all-router";
require('./bootstrap');


Vue.component('dashbord', require('./components/dashbord.vue').default);

const app = new Vue({
    el: '#app',
    router:routes
});
