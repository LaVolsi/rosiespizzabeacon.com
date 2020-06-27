<template>
    <v-app>
        <pageHeader></pageHeader>
        <!--        <div class="revslider" data-alias="homepage"></div>-->
        <div class="banner"></div>
        <v-main style="padding: 0">
            <v-container fluid style="padding: 0 !important">
                <v-card color="secondary">
                    <v-container>
                        <v-row style="font-size: 25px;">
                            <v-col
                                    style="text-align: center; font-family: 'Cinzel Bold',serif"
                                    id="first-FAB"
                                    cols="12"
                                    sm="4"
                            >
                                <v-icon style="font-size: 35px; line-height: 30px">local_dining</v-icon>
                                Dine In
                            </v-col>
                            <v-col
                                    style="text-align: center; font-family: 'Cinzel Bold',serif"
                                    id="middle-FAB"
                                    cols="12"
                                    sm="4"
                            >
                                <v-icon style="font-size: 35px; line-height: 30px">waves</v-icon>
                                Take-Out
                            </v-col>
                            <v-col
                                    style="text-align: center; font-family: 'Cinzel Bold',serif"
                                    id="last-FAB"
                                    cols="12"
                                    sm="4"
                            >
                                <v-icon style="font-size: 35px; line-height: 30px">star</v-icon>
                                Catering Available
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card>
            </v-container>
        </v-main>
        <v-main style="padding: 0">
            <v-container fluid>
                <v-row>
                    <v-col style=" text-align: center">
                        <v-card style="padding: 50px; font-size: 30px">
                            <v-row justify="center">
                                Mon, Wed, Thurs, Sun 11am-9pm
                                <br>
                                Fri & Sat 11am - 10pm | Closed Tuesday
                            </v-row>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
        <pageFooter></pageFooter>
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
