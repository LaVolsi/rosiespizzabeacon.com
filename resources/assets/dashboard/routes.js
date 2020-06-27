import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./components/Dashboard.vue').default,
        children: [
            {
                path: '/',
                component: require('./components/Home.vue').default,
            },
            {
                path: '/menus',
                component: require('./components/menus/Menus.vue').default,
            },
            {
                path: '/liveMusic',
                component: require('./components/liveMusic/LiveMusic.vue').default,
            },
        ]
    },
    {
        path: "*",
        redirect: '/'
    }
];

export default new VueRouter({
    routes
})