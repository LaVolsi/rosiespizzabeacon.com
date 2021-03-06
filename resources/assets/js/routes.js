import VueRouter from 'vue-router';

let routes = [
    {path: '/', component: require('./views/homepage/Homepage.vue').default},
    {path: '/contact', component: require('./views/contact/Contact.vue').default},
    // {path: '/liveMusic', component: require('./views/liveMusic/LiveMusic.vue').default},
    // {path: '/catering', component: require('./views/catering/Catering.vue').default},
    {
        path: "*",
        redirect: '/'
    }
];

export default new VueRouter({
    routes,
    mode: 'history'
})