<template>
    <v-app dark>
        <pageHeader route="/menu"></pageHeader>
        <v-content style="padding: 0">
            <v-container fluid>
                <v-row>
                    <v-col cols="12" id="menuTitle">
                        <p>The Hidden Waterfront</p>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" sm="6" style="text-align: center">
                        <appetizers></appetizers>
                        <POHinfo></POHinfo>
                        <sandwichesAndBurgers></sandwichesAndBurgers>
                        <POHinfo2></POHinfo2>
                    </v-col>
                    <v-col cols="12" sm="6" style="text-align: center">
                        <soupsAndSalads></soupsAndSalads>
                        <POHlegend></POHlegend>
                        <Entrees></Entrees>
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
    Vue.component('soupsAndSalads', require('./utils/SoupsAndSalads.vue').default);
    Vue.component('sandwichesAndBurgers', require('./utils/SandwichesAndBurgers.vue').default);
    Vue.component('Entrees', require('./utils/Entrees.vue').default);
    Vue.component('POHlegend', require('./utils/Legend.vue').default);
    Vue.component('POHinfo', require('./utils/Info.vue').default);
    Vue.component('POHinfo2', require('./utils/Info2.vue').default);
    Vue.component('pageFooter', require('../utils/Footer.vue').default);

    export default {
        data: () => ({}),
        props: {},
        methods: {}
    }
</script>
