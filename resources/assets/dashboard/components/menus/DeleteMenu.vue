<template>
    <v-dialog v-model="dialog" width="500">
        <v-card>
            <v-card-title class="headline grey darken-2" primary-title>
                Are you sure your want to delete this menu?
            </v-card-title>
            <v-card-actions>
                <v-container fluid>
                    <v-row justify="center">
                        <v-btn color="red" @click="deleteMenu()">
                            Delete
                        </v-btn>
                    </v-row>
                </v-container>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        props: ['menu'],
        data() {
            return {
                dialog: false,
            }
        },
        methods: {
            deleteMenu() {
                axios.delete('/menu/' + this.menu.id)
                    .then(response => {
                        this.dialog = false;
                        this.$emit('deleted')
                    })
            }
        }
    }
</script>

<style scoped>

</style>