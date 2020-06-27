<template>
    <v-app dark>
        <v-container fill-height fluid>
            <v-row align-center justify="center">
                <v-card style="max-width: 600px; width: 100%; padding:15px; height: auto;">
                    <v-row px-4>
                        <v-col cols="12"><h2>Login</h2></v-col>
                        <v-col cols="12">
                            <v-text-field
                                    label="Login"
                                    v-model="email"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field
                                    v-model="password"
                                    :append-icon="show1 ? 'visibility_off' : 'visibility'"
                                    :type="show1 ? 'text' : 'password'"
                                    name="password"
                                    label="Password"
                                    @click:append="show1 = !show1"
                            ></v-text-field>
                        </v-col>
                        <v-row justify="center">
                            <v-btn @click="submit()">
                                Login
                            </v-btn>
                        </v-row>
                    </v-row>
                </v-card>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            email: '',
            password: '',
            show1: false,
        }),
        methods: {
            submit() {
                axios.post('/login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    window.location = response.data
                })
            }
        }
    }
</script>

<style scoped>

</style>