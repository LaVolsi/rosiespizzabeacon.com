<template>
    <div style="margin-top: 50px">
        <v-row style="border-bottom: white solid">
            <v-col cols="12" sm="2">
                <h4>Date</h4>
            </v-col>
            <v-col cols="12" sm="2">
                <h4>Name</h4>
            </v-col>
            <v-col cols="12" sm="3">
                <h4>Description</h4>
            </v-col>
            <v-col cols="12" sm="4">
                <h4>Image</h4>
            </v-col>
            <v-col xs1>Delete</v-col>
        </v-row>
        <v-row v-for="(event, index) in events" :key="index">
            <v-col cols="12" sm="2">
                <h4>{{event.date}}</h4>
            </v-col>
            <v-col cols="12" sm="2">
                <h4>{{event.name}}</h4>
            </v-col>
            <v-col cols="12" sm="3">
                <h4>{{event.description}}</h4>
            </v-col>
            <v-col cols="12" sm="4">
                <h4>{{event.label}}</h4>
            </v-col>
            <v-col xs1>
                <v-btn icon small class="ma-0 pa-0" @click="remove(index)">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-col>
        </v-row>
        <v-row justify-center v-if="showLoadMore()">
            <v-btn text @click.native="loadMoreDocuments()">
                Load More
                <v-icon>expand_more</v-icon>
            </v-btn>
        </v-row>
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
                events: [],
                data: {}
            }
        },
        created() {
            axios.get('/events/LiveMusic')
                .then(response => {
                    this.events = response.data.data;
                    this.data = response.data
                })
        },
        methods: {
            remove(index) {
                axios.post('/event/delete', this.events[index]);
                this.events.splice(index, 1);
            },
            showLoadMore() {
                return (this.data.next_page_url)
            },
            loadMoreDocuments() {
                if (this.data.next_page_url) {
                    let path = this.data.next_page_url;
                    axios.get(path)
                        .then(response => {
                            this.events = this.events.concat(response.data.data);
                            this.data = response.data
                        }).catch(error => {
                        console.log(error.response.data)
                    })
                }
            },
        }
    }
</script>

<style scoped>

</style>