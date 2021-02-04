import Vue from 'vue';
import routes from "./router/all-router";
require('./bootstrap');


Vue.component('dashbord', require('./components/dashbord.vue').default);
Vue.component('country', require('./components/country/allCountry'));
Vue.component('deliveryPont', require('./components/delivery_point/allDeliveryPoint'));
Vue.component('depotInfo', require('./components/depot_info/allDepotInfo'));
Vue.component('vehicleInfo', require('./components/vehicle_info/allVehicleInfo'));
Vue.component('buyerInfo', require('./components/buyer_info/allBuyer'));

const app = new Vue({
    el: '#app',
    router:routes
});
