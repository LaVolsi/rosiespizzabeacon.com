<template>
    <div>
        <v-navigation-drawer
                clipped
                fixed
                v-model="drawer"
                app
                class="hidden-md-and-up"
                width="300"
        >
            <v-row>
                <v-col style="text-align: center">
                    <h2 style="font-family: Edwardian Script, cursive; font-size: 30px">ROSIE'S <br> <span
                            style="font-size: 50px">PIZZERIA</span></h2>
                </v-col>
            </v-row>
            <v-list dense>
                <a href="/" style="text-decoration: none; color: white;">
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>home</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                Home
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </a>
                <a v-for="menu in menus" style="text-decoration: none; color: white;">
                    <v-list-item @click="getMenu(menu)">
                        <v-list-item-action>
                            <v-icon>restaurant_menu</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                {{menu.label}}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </a>
                <!--                <a href="/brunch-menu" style="text-decoration: none; color: white;">-->
                <!--                    <v-list-item @click="">-->
                <!--                        <v-list-item-action>-->
                <!--                            <v-icon>emoji_food_beverage</v-icon>-->
                <!--                        </v-list-item-action>-->
                <!--                        <v-list-item-content>-->
                <!--                            <v-list-item-title>-->
                <!--                                Brunch Menu-->
                <!--                            </v-list-item-title>-->
                <!--                        </v-list-item-content>-->
                <!--                    </v-list-item>-->
                <!--                </a>-->
                <!--                <a href="/menu" style="text-decoration: none; color: white;">-->
                <!--                    <v-list-item @click="">-->
                <!--                        <v-list-item-action>-->
                <!--                            <v-icon>restaurant_menu</v-icon>-->
                <!--                        </v-list-item-action>-->
                <!--                        <v-list-item-content>-->
                <!--                            <v-list-item-title>-->
                <!--                                Dinner Menu-->
                <!--                            </v-list-item-title>-->
                <!--                        </v-list-item-content>-->
                <!--                    </v-list-item>-->
                <!--                </a>-->
<!--                <a href="/contact" style="text-decoration: none; color: white;">-->
<!--                    <v-list-item @click="">-->
<!--                        <v-list-item-action>-->
<!--                            <v-icon>contact_mail</v-icon>-->
<!--                        </v-list-item-action>-->
<!--                        <v-list-item-content>-->
<!--                            <v-list-item-title>-->
<!--                                Contact-->
<!--                            </v-list-item-title>-->
<!--                        </v-list-item-content>-->
<!--                    </v-list-item>-->
<!--                </a>-->
<!--                <a href="/liveMusic" style="text-decoration: none; color: white;">-->
<!--                    <v-list-item @click="">-->
<!--                        <v-list-item-action>-->
<!--                            <v-icon>music_note</v-icon>-->
<!--                        </v-list-item-action>-->
<!--                        <v-list-item-content>-->
<!--                            <v-list-item-title>-->
<!--                                Live Music-->
<!--                            </v-list-item-title>-->
<!--                        </v-list-item-content>-->
<!--                    </v-list-item>-->
<!--                </a>-->
<!--                <a href="/catering" style="text-decoration: none; color: white;">-->
<!--                    <v-list-item @click="">-->
<!--                        <v-list-item-action>-->
<!--                            <v-icon>event</v-icon>-->
<!--                        </v-list-item-action>-->
<!--                        <v-list-item-content>-->
<!--                            <v-list-item-title>-->
<!--                                Catering-->
<!--                            </v-list-item-title>-->
<!--                        </v-list-item-content>-->
<!--                    </v-list-item>-->
<!--                </a>-->
                <a href="tel:845-202-7722" style="text-decoration: none; color: white;">
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>call</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                845-202-7722
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </a>
                <a href="https://www.google.com/maps/dir/41.5391744,-73.9418112/pamela's+on+the+hudson/"
                   style="text-decoration: none; color: white;">
                    <v-list-item @click="">
                        <v-list-item-action>
                            <v-icon>directions</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                441 Fishkill Ave, Beacon, New York 12508
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </a>
                <a href="https://www.facebook.com/Gormetpizza">
                    <v-list-item @click="">
                        <v-list-item-content>
                            <v-row justify="center">
                                <img src="/images/facebook.png" alt="" style="width: 30px">
                            </v-row>
                        </v-list-item-content>
                    </v-list-item>
                </a>
<!--                <a href="https://instagram.com/pamelasonthehudson">-->
                <!--                    <v-list-item @click="">-->
                <!--                        <v-list-item-content>-->
                <!--                            <v-row justify="center">-->
                <!--                                <img src="/images/instagram.png" alt="" style="width: 30px">-->
                <!--                            </v-row>-->
                <!--                        </v-list-item-content>-->
                <!--                    </v-list-item>-->
                <!--                </a>-->
            </v-list>
        </v-navigation-drawer>

        <v-container fluid class="secondary">
            <v-row>
                <v-col>
                    <!--                    <img src="/images/logo.png" alt="" class="toolbar-logo">-->
                </v-col>
                <v-col cols="6">
                    <div id="NavbarTitle" style="text-align: center">
                        <p>ROSIE'S <br> <span style="font-size: 50px">PIZZERIA</span></p>
                    </div>
                </v-col>
                <v-col style="text-align: end" class="hidden-sm-and-down">
                    <a href="tel:845-202-7722" style="text-decoration: none">
                        <div id="NavbarPhone">845-202-7722</div>
                    </a>
                    <a href="https://www.google.com/maps/dir/41.5391744,-73.9418112/pamela's+on+the+hudson/"
                       style="text-decoration: none">
                        <div id="NavbarAddress">441 Fishkill Ave, Beacon, New York 12508</div>
                    </a>
                </v-col>
                <v-col class="hidden-md-and-up" style="text-align: end">
                    <v-btn icon style="margin-top: 25px" @click="drawer = true">
                        <v-icon>menu</v-icon>
                    </v-btn>
                </v-col>
            </v-row>
            <div class="hidden-sm-and-down">
                <v-tabs
                        slot="extension"
                        v-model="model"
                        centered
                        background-color="menuColor"
                        slider-color="white"
                >
                    <v-tab style="color: white !important;" href="/">
                        Home
                    </v-tab>
                    <v-tab style="color: white !important;" v-for="menu in menus" :key="menu.id" href="" @click="getMenu(menu)">
                        {{menu.label}}
                    </v-tab>
<!--                    <v-tab style="color: white !important;" href="/contact">-->
<!--                        Contact-->
<!--                    </v-tab>-->
<!--                    <v-tab style="color: white !important;" href="/liveMusic">-->
<!--                        Live Music-->
<!--                    </v-tab>-->
<!--                    <v-tab style="color: white !important;" href="/catering">-->
<!--                        Catering-->
<!--                    </v-tab>-->
                    <v-tab style="color: white !important;" href="https://www.facebook.com/Gormetpizza">
                        <img src="/images/facebook.png" alt="" style="width: 30px; height: 30px">
                    </v-tab>
<!--                    <v-tab style="color: white !important;" href="https://instagram.com/pamelasonthehudson">-->
<!--                        <img src="/images/instagram.png" alt="" style="width: 30px; height: 30px">-->
<!--                    </v-tab>-->
                </v-tabs>
            </div>
        </v-container>
    </div>
</template>

<script>
    export default {
        props: ['route'],
        data: () => ({
            drawer: false,
            model: '/',
            menus: [],
        }),
        created() {
            this.model = this.route;
            axios.get('/menus').then(response => {
                this.menus = response.data
            })
        },
        methods: {
            getMenu(menu) {
                axios({
                    url: '/menu/' + menu.label,
                    method: 'GET',
                    responseType: 'blob', // important
                }).then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;

                    let storageLabel = menu.storageLabel.split('.'),
                        type = storageLabel[storageLabel.length - 1];

                    link.setAttribute('download', menu.label + '.' + type);
                    document.body.appendChild(link);
                    link.click();
                })
            }
        }
    }
</script>

<style scoped>

</style>