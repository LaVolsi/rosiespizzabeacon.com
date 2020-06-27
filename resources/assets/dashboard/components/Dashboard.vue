<template>
    <v-app dark>
        <v-navigation-drawer
                v-model="drawer"
                app
                temporary
        >
            <v-list dense>
                <v-list-item @click="$router.push('/')">
                    <v-list-item-action>
                        <v-icon>dashboard</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Home</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="$router.push('/menus')">
                    <v-list-item-action>
                        <v-icon>menu_book</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Menus</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
<!--                <v-list-item @click="$router.push('/LiveMusic')">-->
<!--                    <v-list-item-action>-->
<!--                        <v-icon>settings</v-icon>-->
<!--                    </v-list-item-action>-->
<!--                    <v-list-item-content>-->
<!--                        <v-list-item-title>Live Music</v-list-item-title>-->
<!--                    </v-list-item-content>-->
<!--                </v-list-item>-->
<!--                <v-list-item @click="goToSliderRev()">-->
<!--                    <v-list-item-action>-->
<!--                        <v-icon>aspect_ratio</v-icon>-->
<!--                    </v-list-item-action>-->
<!--                    <v-list-item-content>-->
<!--                        <v-list-item-title>Edit Sliders</v-list-item-title>-->
<!--                    </v-list-item-content>-->
<!--                </v-list-item>-->
<!--                <v-list-item @click="downloadMailingList()">-->
<!--                    <v-list-item-action>-->
<!--                        <v-icon>assignment</v-icon>-->
<!--                    </v-list-item-action>-->
<!--                    <v-list-item-content>-->
<!--                        <v-list-item-title>Download Mailing List</v-list-item-title>-->
<!--                    </v-list-item-content>-->
<!--                </v-list-item>-->
            </v-list>
        </v-navigation-drawer>
        <v-app-bar app clipped-left>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Dashboard</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn text @click="logout()">
                Close &nbsp;
                <v-icon>exit_to_app</v-icon>
            </v-btn>
        </v-app-bar>
        <v-content style="padding: 0">
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-content>
        <v-footer app fixed>
            <v-spacer></v-spacer>
            <span style="margin-right:25px">Created by Paul Livorsi from Hudson Valley Computers - &copy; Pamela's On The Hudson 2018</span>
        </v-footer>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            drawer: false
        }),
        methods: {
            downloadMailingList() {
                axios({
                    url: '/mailingList',
                    method: 'GET',
                    responseType: 'blob', // important
                }).then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'mailingList.csv');
                    document.body.appendChild(link);
                    link.click();
                });
            },
            logout() {
                axios.get('/logout')
                    .then(response => {
                        console.log(response);
                        window.location.href = '/'
                    })
            },
            goToSliderRev() {
                window.location.href = '/revslider-standalone/index.php'
            }

        }
    }
</script>

<style scoped>

</style>