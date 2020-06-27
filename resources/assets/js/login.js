import './bootstrap';
import vuetify from './vuetify';


Vue.component('login', require('./views/login/Login.vue').default);

new Vue({
    vuetify,
}).$mount('#app');