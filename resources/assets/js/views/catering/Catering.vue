<template>
    <v-app dark>
        <POHheader2 route="/catering"></POHheader2>

        <v-content style="padding: 0">
            <v-container fluid>
                <v-row justify="center">
                    <v-card style="max-width: 1500px; width: 100%; padding:15px; background-color: #212121;">
                        <v-row>
                            <v-col cols="12" class="contactUsTitle">
                                <div style="border: #6B8059 solid 8px; border-radius: 50px;">
                                    <p class="cateringTitle">
                                        <b>Pamel<span id="pamsApostophe">a</span>'s Traveling Feast</b>
                                    </p>
                                    <p style="font-family:'Cinzel Bold',serif;">
                                        <span class="cateringSubtitle1">Boutique Caterers</span>
                                        <br>
                                        <span class="cateringSubtitle2">Crafting Cherished Memories</span>
                                    </p>
                                </div>
                                <p>On & Off Premise Catering</p>
                                <p>
                                    <a href="tel:845-562-4505"
                                       style="color: white; text-decoration: none; font-size:25px">
                                        845 562 4505
                                    </a>
                                    &nbsp;
                                    &nbsp;
                                    |
                                    &nbsp;
                                    &nbsp;
                                    <a href="tel:845-926-6186"
                                       style="color: white; text-decoration: none; font-size:25px">
                                        845 926 6186
                                    </a>
                                </p>
                            </v-col>
                        </v-row>

                        <div class="revslider" data-alias="catering"></div>

                        <v-container style="max-width: 1300px; text-align: center">
                            <v-row class="cateringBullets">
                                <v-col cols="12" md="3">Weddings</v-col>
                                <v-col cols="12" md="1"><span>&#9672;</span></v-col>
                                <v-col cols="12" md="4">Corporates</v-col>
                                <v-col cols="12" md="1"><span>&#9672;</span></v-col>
                                <v-col cols="12" md="3" style="font-size: 30px">Social Events</v-col>
                                <v-col cols="12" md="1" v-if="$vuetify.breakpoint.smAndDown"><span>&#9672;</span>
                                </v-col>
                                <v-col cols="12" md="3" offset-md="2">Film/Photo Shoots</v-col>
                                <v-col cols="12" md="2"><span>&#9672;</span></v-col>
                                <v-col cols="12" md="3" style="font-size: 30px" pt-3>Funerals</v-col>
                            </v-row>
                        </v-container>
                    </v-card>
                    <v-card style="max-width: 1500px; width: 100%;" class="pa-12 mb-12">
                        <v-row>
                            <v-col cols="12" class="contactUsTitle">
                                <p style="font-family:'Cinzel Bold',serif;">
                                    <span style="font-size: 50px;">Service Includes</span>
                                    <br>
                                </p>
                                <p style="font-size: 30px; line-height: 25px">Exceptional Quality Cusine</p>
                                <p style="font-size: 30px; line-height: 25px">Production Planning</p>
                                <p style="font-size: 30px; line-height: 25px">Exquisite Presentation</p>
                                <p style="font-size: 30px; line-height: 25px">Custom Designed Menus</p>
                                <p style="font-size: 30px; line-height: 25px">Extraordinary Staff</p>
                            </v-col>
                            <v-col cols="12" class="text-center"
                                   style="font-family:'Cinzel Bold',serif; border-top: solid white 2px">
                                <p class="display-1"> Back by Popular Demand…. “Drop and Set”</p>
                                <p class="headline">for events now available (NO service required)</p>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" style="text-align: center">
                                <p style="font-family:'Cinzel Bold',serif;
                                                        font-size: 50px; color: #6B8059;
                                                        max-width: 500px;
                                                        margin: 0 auto;
                                                        border: #6B8059 solid 8px; border-radius: 30px; margin-bottom:20px">
                                    Plan With Us</p>
                            </v-col>
                            <v-container fluid>
                                <v-row justify="center">
                                    <v-alert
                                            v-if="showAlert"
                                            v-model="showAlert"
                                            dismissible
                                            :type="alert.type"
                                            transition="scale-transition"
                                            style="position: absolute; width:100%; z-index:100"
                                    >
                                        {{alert.message}}
                                    </v-alert>
                                    <v-col cols="12" style="max-width: 700px">
                                        <v-text-field
                                                label="Name"
                                                outline
                                                v-model="name"
                                                :error-messages="nameErrors"
                                                @input="delayTouch($v.name)"
                                                @blur="$v.name.$touch()"
                                        ></v-text-field>
                                        <v-text-field
                                                label="Email"
                                                outline
                                                v-model="email"
                                                :error-messages="emailErrors"
                                                @input="delayTouch($v.email)"
                                                @blur="$v.email.$touch()"
                                        ></v-text-field>
                                        <v-text-field
                                                label="Phone"
                                                outline
                                                v-model="phone"
                                                :error-messages="phoneErrors"
                                                @input="delayTouch($v.phone)"
                                                @blur="$v.phone.$touch()"
                                        ></v-text-field>
                                        <v-textarea
                                                label="Message"
                                                outline
                                                v-model="message"
                                                :error-messages="messageErrors"
                                                @input="delayTouch($v.message)"
                                                @blur="$v.message.$touch()"
                                        ></v-textarea>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-btn @click.native="submit()">
                                        submit
                                    </v-btn>
                                </v-row>
                            </v-container>
                        </v-row>
                    </v-card>
                </v-row>
            </v-container>
        </v-content>
        <POHfooter></POHfooter>
    </v-app>
</template>

<script>
    import {required, email, helpers} from 'vuelidate/lib/validators'

    const touchMap = new WeakMap();
    const regex = new RegExp(/^[\+]?(([0-9]{1})[-\s\.]?)?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4}$/);
    const phoneCheck = (value) => !helpers.req(value) || regex.test(value);

    export default {
        data: () => ({
            loading: false,
            drawer: false,
            model: 'Menu',
            name: '',
            email: '',
            phone: '',
            message: '',
            alert: {message: '', type: 'success'},
            showAlert: false,
        }),
        validations: {
            name: {
                required,
            },
            email: {
                required,
                email
            },
            phone: {
                required,
                phoneCheck
            },
            message: {
                required,
            },
        },
        computed: {
            nameErrors() {
                const errors = [];
                if (!this.$v.name.$dirty) return errors;
                !this.$v.name.required && errors.push('Name is required.');
                return errors
            },
            emailErrors() {
                const errors = [];
                if (!this.$v.email.$dirty) return errors;
                !this.$v.email.required && errors.push('Email is required.');
                !this.$v.email.email && errors.push('Email is invalid.');
                return errors
            },
            phoneErrors() {
                const errors = [];
                if (!this.$v.phone.$dirty) return errors;
                !this.$v.phone.required && errors.push('Phone Number is required.');
                !this.$v.phone.phoneCheck && errors.push('Phone Number is invalid.');
                return errors
            },
            messageErrors() {
                const errors = [];
                if (!this.$v.message.$dirty) return errors;
                !this.$v.message.required && errors.push('Message is required.');
                return errors
            },
        },
        props: {},
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
                    axios.post('/email/catering/contact', {
                        name: this.name,
                        email: this.email,
                        phone: this.phone,
                        message: this.message,
                    })
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
        }
    }
</script>
