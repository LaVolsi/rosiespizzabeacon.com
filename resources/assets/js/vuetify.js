import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        dark: true,
        themes: {
            dark: {
                primary: '#795548',
                secondary: '#D2B48C',
                menuColor: '#4E342E',
                accent: '#FFFFFF',
            },
            light: {
                primary: '#795548',
                secondary: '#D2B48C',
                menuColor: '#4E342E',
                accent: '#FFFFFF',
            },
        }
    },
})