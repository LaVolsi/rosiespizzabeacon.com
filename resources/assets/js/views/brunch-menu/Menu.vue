<template>
    <v-app dark>
        <pageHeader route="/brunch-menu"></pageHeader>
        <v-content style="padding: 0">
            <v-container fluid>
                <v-row>
                    <v-col cols="12" id="menuTitle">
                        <p>Brunch At The Hidden Waterfront</p>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" style="text-align: center">
                        <appetizers></appetizers>
                    </v-col>
                    <v-col cols="12" sm="6" style="text-align: center">
                        <Brunch></Brunch>
                        <Sides></Sides>
                    </v-col>
                    <v-col cols="12" sm="6" style="text-align: center">
                        <Lunch></Lunch>
                        <Refreshments></Refreshments>
                        <POHlegend></POHlegend>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <pageFooter></pageFooter>
    </v-app>
</template>

<script>
    Vue.component('pageHeader', require('../utils/Header.vue').default);
    Vue.component('appetizers', require('./utils/Appetizers.vue').default);
    Vue.component('Brunch', require('./utils/Brunch.vue').default);
    Vue.component('Lunch', require('./utils/Lunch.vue').default);

    Vue.component('POHlegend', require('./utils/Legend.vue').default);
    Vue.component('Sides', require('./utils/Sides.vue').default);
    Vue.component('Refreshments', require('./utils/Refreshments.vue').default);
    Vue.component('pageFooter', require('../utils/Footer.vue').default);

    export default {
        data: () => ({}),
        props: {},
        methods: {}
    }
</script>
