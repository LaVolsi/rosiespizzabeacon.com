import './bootstrap';
import vuetify from './vuetify';
import router from './routes';
import App from './App.vue'

Vue.component('POHheader', require('./views/utils/Header.vue').default);
Vue.component('POHheader2', require('./views/utils/Header2.vue').default);
Vue.component('POHfooter', require('./views/utils/Footer.vue').default);

new Vue({
    vuetify,
    router,
    render: h => h(App),
    mounted() {
        document.dispatchEvent(new Event('render-event'))
    }
}).$mount('#app');