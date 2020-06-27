<template>
    <v-container fluid class="pt-12">
        <v-row>
            <v-col cols="12" sm="6">
                <v-text-field
                        slot="activator"
                        v-model="label"
                        label="Menu Label"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
                <v-row justify="center">
                    <v-col>
                        <v-row justify="center">
                            <v-btn
                                    large
                                    color="purple"
                                    @click="selectFiles()"
                            >
                                <v-icon left>photo</v-icon>
                                Upload Menu
                            </v-btn>
                            <input type="file" id="control" style="display: none"
                                   @change="filesChange($event.target.files)">
                        </v-row>
                    </v-col>
                    <v-col>
                        <h3 v-if="!menuSelected">No Menu Selected</h3>
                        <h3 v-if="menuSelected">Menu Selected
                            <v-icon right>check</v-icon>
                        </h3>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="12" sm="6">
                <v-row justify="center" pt-3>
                </v-row>
            </v-col>
            <v-col cols="12" pt-5>
                <v-row justify="center">
                    <v-btn large color="green darken-3" :disabled="saveDisabled()" @click="save()" :loading="loading">
                        <v-icon left>save</v-icon>
                        Save Menu
                    </v-btn>
                </v-row>
            </v-col>
        </v-row>
        <showMenus ref="showMenus"></showMenus>
    </v-container>
</template>

<script>
    Vue.component('showMenus', require('./ShowMenus.vue').default);

    export default {
        data: () => ({
            loading: false,
            label: '',
            menu: '',
            menuName: '',
            menuSelected: false,
            formData: new FormData(),
        }),
        methods: {
            selectFiles() {
                document.getElementById('control').click()
            },
            filesChange(fileList) {
                this.menuSelected = true;
                Object.keys(fileList).map(index => {
                    let filename = fileList[index].name;
                    if (this.checkFileType(filename)) {
                        this.menuName = fileList[index].name;
                        this.formData.append('document', fileList[index], fileList[index].name);
                    }
                });
            },
            save() {
                this.loading = true;
                this.formData.set('label', this.label);
                axios.post('/menu',
                    this.formData
                ).then(response => {
                    this.clear();
                    this.$refs.showMenus.getDataFromApi();
                    this.loading = false;
                }).catch(error => {
                    this.message = error.response.data;
                    this.loading = false;
                })
            },
            clear() {
                this.formData = null;
                this.label = '';
                this.menu = '';
                this.menuName = '';
                this.menuSelected = false;
                this.formData = new FormData();
            },
            checkFileType(filename) {
                let types = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];
                let index = types.findIndex(type => {
                    return filename.includes(type)
                });

                return (index > -1)
            },
            saveDisabled() {
                if (this.label === '') return true;
                return !this.formData.has('document');
            }
        },
    }
</script>

<style scoped>

</style>