import './bootstrap';
import router from './routes';
import vuetify from './vuetify';

Vue.component('pageHeader', require('./views/utils/Header.vue').default);
Vue.component('pageFooter', require('./views/utils/Footer.vue').default);

new Vue({
    el: '#app',
    vuetify,
    router,
});