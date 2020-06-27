import "babel-polyfill";
import Vue from 'vue';
// import Vuex from 'vuex';
import Vuetify from 'vuetify';
import Vuelidate from 'vuelidate';
import axios from 'axios';
import VueRouter from 'vue-router';

// Vue.use(Vuex);
Vue.use(Vuelidate);
Vue.use(VueRouter);

Vue.use(Vuetify, {
    theme: {
        primary: '#777777', //teal darken-2
        secondary: '#F47D56', //deep-purple base
        accent: '#FFFFFF', //amber darken-2
        // error: '#FF5252', //red base
        // info: '#2196F3', //blue
        // success: '#4CAF50', //green base
        // warning: '#FFC107', //orange base
        // create: '#ffb300', //amber darken-1
        // activated: '#00796b', //teal darken-2
        // disabled: '#757575', //grey darken-1
    }
});

window.Vue = Vue;

window.axios = axios;
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.debounce = function(fn, delay) {
    let timeoutID = null;
    return function () {
        clearTimeout(timeoutID);
        let args = arguments;
        let that = this;
        timeoutID = setTimeout(function () {
            fn.apply(that, args)
        }, delay)
    }
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });