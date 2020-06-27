import './bootstrap'
// import {store} from './vuex/store';
import router from './routes';
import vuetify from "../js/vuetify";

//Basic Inputs
Vue.component('dashboard', require('./components/Dashboard.vue').default);

new Vue({
    vuetify,
    router,
}).$mount('#app');
