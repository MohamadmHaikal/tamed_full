import {createApp} from "vue";
import router from "./router";
import DKToast from 'vue-dk-toast';
import EmployeesIndex from  './components/pages/HomeDemoOne'
require('./bootstrap');

require('alpinejs');
import "./assets/custom.scss";

createApp({
    components:{
        EmployeesIndex
    }
}).use(router).use(DKToast).mount("#app");
