<template>
    <v-simple-table>
        <thead>
        <tr>
            <th class="text-left">Label</th>
            <th class="text-left">Order</th>
            <th class="text-left"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in items" :key="item.id">
            <td>{{ item.label }}</td>
            <td>{{ item.order }}</td>
            <td>
                <v-btn color="purple" icon @click="editPrompt(item)">
                    <v-icon>edit</v-icon>
                </v-btn>
                <v-btn color="red" icon @click="deletePrompt(item)">
                    <v-icon>delete</v-icon>
                </v-btn>
            </td>
        </tr>
        </tbody>
        <editMenu ref="editMenu" :menu="selectedMenu" :items="items" @updated="itemUpdated()"></editMenu>
        <deleteMenu ref="deleteMenu" :menu="selectedMenu" @deleted="itemDeleted()"></deleteMenu>
    </v-simple-table>
</template>

<script>
    Vue.component('deleteMenu', require('./DeleteMenu.vue').default);
    Vue.component('editMenu', require('./EditMenu.vue').default);
    export default {
        data() {
            return {
                totalItems: 0,
                items: [],
                loading: true,
                selectedMenu: {},
                headers: [
                    {text: 'Label', value: 'label'},
                    {text: 'Order', value: 'order'},
                    {text: '', value: ''},
                ],
            }
        },
        watch: {
            options: {
                handler() {
                    this.getDataFromApi()
                },
                deep: true,
            },
        },
        mounted() {
            this.getDataFromApi()
        },
        methods: {
            getDataFromApi() {
                this.loading = true;
                axios.get('/menus')
                    .then(response => {
                        this.items = response.data;
                        this.totalItems = response.data.length;
                        this.loading = false;
                    })
            },
            deletePrompt(item) {
                this.$refs.deleteMenu.dialog = true;
                this.selectedMenu = item;
            },
            itemDeleted() {
                let index = items.findIndex(item => {
                    return item.id === this.selectedMenu.id
                });
                this.items.splice(index, 1);
                this.itemUpdated();

            },
            editPrompt(item) {
                this.$refs.editMenu.dialog = true;
                this.selectedMenu = item;
            },
            itemUpdated() {
                this.getDataFromApi();
                this.selectedMenu = {};
            }
        },
    }
</script>

<style scoped>

</style>