<template>
    <div id="app">
        <v-app id="inspire" dark>

            <pageHeader route="/contact"></pageHeader>

            <v-main style="padding:0">
                <v-container fluid style="margin-bottom: 50px;">
                    <v-row justify="center">
                        <v-card style="max-width: 900px; width: 100%; padding:15px">
                            <v-row>
                                <v-col cols="12" class="contactUsTitle">
                                    <p>Contact Us & Reservations</p>
                                    <p>
                                        <a href="tel:845-562-4505"
                                           style="color: white; text-decoration: none; font-size:25px">
                                            845 562 4505
                                        </a>
                                    </p>
                                </v-col>
                            </v-row>
                            <v-container>
                                <v-row>
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
                                    <v-col cols="12">
                                        <v-text-field
                                                label="Name"
                                                outline
                                                v-model="name"
                                                :error-messages="nameErrors"
                                                @input="delayTouch($v.name)"
                                                @blur="$v.name.$touch()"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                                label="Email"
                                                outline
                                                v-model="email"
                                                :error-messages="emailErrors"
                                                @input="delayTouch($v.email)"
                                                @blur="$v.email.$touch()"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                                label="Phone"
                                                outline
                                                v-model="phone"
                                                :error-messages="phoneErrors"
                                                @input="delayTouch($v.phone)"
                                                @blur="$v.phone.$touch()"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
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
                        </v-card>
                    </v-row>
                </v-container>
            </v-main>

            <pageFooter></pageFooter>

        </v-app>
    </div>
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
                    axios.post('/email/contact', {
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


<!--<pageFooter></pageFooter>-->
<!--</v-app>-->
<!--</div>-->
<!--</template>-->

<!--<script>-->
<!---->
<!--</script>-->
