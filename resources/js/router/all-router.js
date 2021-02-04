import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Dashbord from '../components/dashbord.vue';
import Country from '../components/country/allCountry';
import DeliveryPoint from '../components/delivery_point/allDeliveryPoint';
import DepotInfo from '../components/depot_info/allDepotInfo';
import VehicleInfo from '../components/vehicle_info/allVehicleInfo';
import BuyerInfo from '../components/buyer_info/allBuyer';
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
        },
        {
            path:'/deliveryPoint',
            component:DeliveryPoint
        },
        {
            path:'/depotInfo',
            component:DepotInfo
        },
        {
            path:'/vehicleInfo',
            component:VehicleInfo
        },
        {
            path:'/buyerInfo',
            component:BuyerInfo
        }
    ]
});
export default routes;
