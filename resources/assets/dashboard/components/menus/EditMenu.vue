<template>
    <v-dialog v-model="dialog" width="500">
        <v-card>
            <v-card-title class="headline grey darken-2" primary-title>
                Edit Menu
            </v-card-title>
            <v-card-text>
                <v-container>
                    <v-row>
                        <v-text-field
                                v-model="label"
                        ></v-text-field>
                    </v-row>
                    <v-row>
                        <v-select
                                v-model="order"
                                :items="orders"
                        ></v-select>
                    </v-row>
                </v-container>
            </v-card-text>
            <v-card-actions>
                <v-container fluid>
                    <v-row justify="center">
                        <v-btn color="green" @click="updateMenu()">
                            Update
                        </v-btn>
                    </v-row>
                </v-container>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        props: ['menu', 'items'],
        data() {
            return {
                dialog: false,
                label: null,
                order: null,
                orders: [],
            }
        },
        watch: {
            dialog(newVal, oldVal) {
                if (newVal) {
                    this.label = this.menu.label;
                    this.order = this.menu.order;
                    this.items.forEach((item, index) => {
                        this.orders.push({text: index, value: index})
                    });
                }
            }
        },
        methods: {
            updateMenu() {
                axios.put('/menu/', {
                    id: this.menu.id,
                    label: this.label,
                    order: this.order,
                }).then(response => {
                    this.dialog = false;
                    this.$emit('updated')
                })
            }
        }
    }
</script>

<style scoped>

</style>