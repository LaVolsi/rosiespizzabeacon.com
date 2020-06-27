<template>
    <v-app>
        <POHheader></POHheader>
        <div class="revslider" data-alias="homepage"></div>
        <v-content style="padding: 0">
            <v-container fluid style="padding: 0 !important">
                <v-card style="background-color: rgb(234, 106, 64);">
                    <v-container>
                        <v-row style="font-size: 25px;">
                            <v-col
                                    style="text-align: center; font-family: 'Cinzel Bold',serif"
                                    id="first-FAB"
                                    cols="12"
                                    sm="4"
                            >
                                <v-icon style="font-size: 35px; line-height: 30px">local_dining</v-icon>
                                Modern American Cuisine
                            </v-col>
                            <v-col
                                    style="text-align: center; font-family: 'Cinzel Bold',serif"
                                    id="middle-FAB"
                                    cols="12"
                                    sm="4"
                            >
                                <v-icon style="font-size: 35px; line-height: 30px">waves</v-icon>
                                Scenic Atmosphere
                                <br>
                                On The Hudson
                            </v-col>
                            <v-col
                                    style="text-align: center; font-family: 'Cinzel Bold',serif"
                                    id="last-FAB"
                                    cols="12"
                                    sm="4"
                            >
                                <v-icon style="font-size: 35px; line-height: 30px">star</v-icon>
                                Providing A Unique
                                <br>
                                Dining Experience
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
                <v-card>
                    <v-container>
                        <v-row style="padding: 25px 0 ">
                            <v-col
                                    style="text-align: center; border-bottom: white solid; border-bottom-width: 1px; padding: 10px 0"
                                    cols="12"
                            >
                                <h1>Wednesdays</h1>
                                <h2>Dinner Service: 4PM - 10PM</h2>
                                <h4>Happy Hour From 4PM to 6:30PM - $1 Off All Drinks - Half Price Bar Menu</h4>
                                <h4>Dinner For Two Special @ $59.95 - 2 Appetizers, 2 Entrees And A Bottle Of Wine From
                                    Select Menu</h4>
                                <h4>First Wednesday of the month is Trivia.</h4>
                            </v-col>
                            <v-col
                                    style="text-align: center; border-bottom: white solid; border-bottom-width: 1px; padding: 10px 0"
                                    cols="12"
                            >
                                <h1>Thursdays</h1>
                                <h2>Dinner Service: 4PM - 10PM</h2>
                                <h4>Happy Hour From 4PM to 6:30PM - $1 Off All Drinks - Half Price Bar Menu</h4>
                            </v-col>
                            <v-col
                                    style="text-align: center; border-bottom: white solid; border-bottom-width: 1px; padding: 10px 0"
                                    cols="12"
                            >
                                <h1>Fridays</h1>
                                <h2>Dinner Service: 4PM - 11PM</h2>
                                <h4>Happy Hour From 4PM to 6:30PM - $1 Off All Drinks - Free Happy Hour Buffet</h4>
                                <h4>Live Music 8:30pm-11:30pm</h4>
                                <h4>Chef Specials</h4>
                            </v-col>
                            <v-col
                                    style="text-align: center; border-bottom: white solid; border-bottom-width: 1px; padding: 10px 0"
                                    cols="12"
                            >
                                <h1>Saturdays</h1>
                                <h2>Dinner Service: 4PM - 11PM</h2>
                                <h4>Live Music 8PM - 11 PM</h4>
                                <h4>Chef Specials</h4>
                            </v-col>
                            <v-col
                                    style="text-align: center; border-bottom: white solid; border-bottom-width: 1px; padding: 10px 0"
                                    cols="12"
                            >
                                <h1>Sundays</h1>
                                <h2>Brunch Service: 10:30AM - 3PM</h2>
                                <h4>Bloody Mary Bar With All The Fixin's</h4>
                                <h4>$15 Pitchers of Mimosas & Bloody Mary's</h4>
                            </v-col>
                            <v-col
                                    style="text-align: center; border-bottom: white solid; border-bottom-width: 1px; padding: 10px 0"
                                    cols="12"
                            >
                                <h1>“Dock and Dine”</h1>
                                <h2>Call Bill Himarris 845-405-2879</h2>
                                <h4>to reserve your slip in the NYC Marina</h4>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            </v-container>
        </v-content>
        <v-content style="padding: 0">
            <v-container fluid>
                <v-row>
                    <v-col style=" text-align: center">
                        <v-card style="padding: 50px">
                            <v-alert
                                    v-if="showAlert"
                                    v-model="showAlert"
                                    dismissible
                                    :type="alert.type"
                                    transition="scale-transition"
                                    style="position: absolute; width:100%; margin-left: -50px; z-index:100"
                            >
                                {{alert.message}}
                            </v-alert>
                            <h1><u>Join Our Mailing List</u></h1>
                            <v-text-field
                                    label="Email"
                                    v-model="input"
                                    :error-messages="Errors"
                                    @input="delayTouch($v.input)"
                                    @blur="$v.input.$touch()"
                            ></v-text-field>
                            <v-row justify="center">
                                <v-btn @click="submit()" :disabled="showAlert" :loading="loading">
                                    Submit
                                </v-btn>
                            </v-row>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <POHfooter></POHfooter>
    </v-app>
</template>

<script>
    import {required, email} from 'vuelidate/lib/validators'

    const touchMap = new WeakMap();

    export default {
        data: () => ({
            loading: false,
            drawer: false,
            model: 'Menu',
            input: '',
            alert: {message: '', type: 'success'},
            showAlert: false,
        }),
        validations: {
            input: {
                required,
                email
            },
        },
        computed: {
            Errors() {
                const errors = [];
                if (!this.$v.input.$dirty) return errors;
                !this.$v.input.required && errors.push('Email is required.');
                !this.$v.input.email && errors.push('Email is invalid.');
                return errors
            },
        },
        methods: {
            delayTouch($v) {
                $v.$reset();
                if (touchMap.has($v)) {
                    clearTimeout(touchMap.get($v))
                }
                touchMap.set($v, setTimeout($v.$touch, 1000))
            },
            submit() {
                if (!this.check()) {
                    this.loading = true;
                    axios.post('/mailingList', {email: this.input})
                        .then(response => {
                            this.alert.message = response.data;
                            this.alert.type = 'success';
                            this.showAlert = true;
                        })
                        .catch(error => {
                            if (error.response.data.errors) {
                                this.alert.type = 'error';
                                this.showAlert = true;
                                Object.keys(error.response.data.errors).map(key => {
                                    this.alert.message = error.response.data.errors[key][0]
                                })
                            } else {
                                this.alert.message = error.response.data.message;
                                this.alert.type = 'error';
                                this.showAlert = true;
                            }
                        });
                    this.loading = false;
                    setTimeout(() => {
                        this.showAlert = false
                    }, 3000);
                }
            },
            check() {
                this.$v.$touch();
                return this.$v.$anyError
            }
        },
    }
</script>
