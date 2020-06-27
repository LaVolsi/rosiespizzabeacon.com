<template>
    <v-container fluid class="pa-12">
        <v-row>
            <v-col cols="12" sm="6">
                <v-menu
                        ref="menu"
                        :close-on-content-click="false"
                        v-model="menu"
                        :nudge-right="40"
                        :return-value.sync="date"
                        transition="scale-transition"
                        offset-y
                        full-width
                        min-width="290px"
                >
                    <template v-slot:activator="{ on }">
                        <v-text-field
                                v-model="date"
                                label="Select Event Date"
                                prepend-icon="event"
                                readonly
                                v-on="on"
                        ></v-text-field>
                    </template>
                    <v-date-picker v-model="date" no-title scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.menu.save(date)">OK</v-btn>
                    </v-date-picker>
                </v-menu>
            </v-col>
            <v-col cols="12" sm="6">
                <v-text-field
                        slot="activator"
                        v-model="name"
                        label="Event Name"
                ></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field
                        slot="activator"
                        v-model="description"
                        label="Event Description"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6">
                <v-row justify-center>
                    <v-btn
                            large
                            color="purple"
                            @click="selectFiles()"
                    >
                        <v-icon left>photo</v-icon>
                        Upload Image
                    </v-btn>
                    <input type="file" id="control" style="display: none" @change="filesChange($event.target.files)">
                </v-row>
            </v-col>
            <v-col cols="12" sm="6">
                <v-row justify-center pt-3>
                    <h3 v-if="!imageSelected">No Image Selected</h3>
                    <h3 v-if="imageSelected">Image Selected
                        <v-icon right>check</v-icon>
                    </h3>
                </v-row>
            </v-col>
            <v-col cols="12" pt-5>
                <v-row justify-center>
                    <v-btn large color="green darken-3" @click="save()" :loading="loading">
                        <v-icon left>save</v-icon>
                        Save Event
                    </v-btn>

                </v-row>
            </v-col>
        </v-row>
        <showLiveMusic ref="showLiveMusic"></showLiveMusic>
    </v-container>
</template>

<script>
    Vue.component('showLiveMusic', require('./ShowLiveMusic.vue').default);

    export default {
        data: () => ({
            loading: false,
            menu: false,
            date: '',
            name: '',
            description: '',
            image: '',
            imageName: '',
            imageSelected: false,
            formData: new FormData(),
        }),
        methods: {
            selectFiles() {
                document.getElementById('control').click()
            },
            filesChange(fileList) {
                this.imageSelected = true;
                Object.keys(fileList).map(index => {
                    let filename = fileList[index].name;
                    if (filename.match(/.(jpg|jpeg|png|gif|)$/i)) {
                        this.imageName = fileList[index].name;
                        this.formData.append('document', fileList[index], fileList[index].name);
                    }
                });
            },
            save() {
                this.loading = true;
                this.formData.set('date', this.date);
                this.formData.set('name', this.name);
                this.formData.set('description', this.description);
                axios.post('/event/save',
                    this.formData
                ).then(response => {
                    this.message = response.data;
                    this.$refs.showLiveMusic.events.push({
                        'date': this.date,
                        'name': this.name,
                        'description': this.description,
                        'label': this.imageName,
                    });
                    this.clear();
                    this.loading = false;
                }).catch(error => {
                    this.message = error.response.data;
                    this.loading = false;
                })
            },
            clear() {
                this.formData = new FormData();
                this.date = '';
                this.name = '';
                this.description = '';
                this.image = '';
                this.imageName = '';
                this.imageSelected = false;
            }
        },
    }
</script>

<style scoped>

</style>