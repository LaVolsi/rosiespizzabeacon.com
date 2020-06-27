import Vuetify from "vuetify";
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        dark: true,
        themes: {
            dark: {
                primary: '#777777',
                secondary: '#F47D56',
                accent: '#FFFFFF',
                pamsGreen: '#6B8059',
            },
            light: {
                primary: '#777777',
                secondary: '#F47D56',
                accent: '#FFFFFF',
                pamsGreen: '#6B8059',
            },
        }
    },
})