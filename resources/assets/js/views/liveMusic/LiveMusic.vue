<template>
    <div id="app">
        <v-app id="inspire" dark>
            <pageHeader route="/liveMusic"></pageHeader>
            <v-container style="margin-bottom: 50px;">
                <v-row justify="center">
                    <v-card style="max-width: 1000px; width: 100%; padding:15px">
                        <v-row>
                            <v-col cols="12" class="contactUsTitle">
                                <p>Live Music & Events</p>
                                <p>
                                    <a href="tel:845-562-4505"
                                       style="color: white; text-decoration: none; font-size:25px">
                                        845 562 4505
                                    </a>
                                </p>
                            </v-col>
                        </v-row>
                        <v-container style="max-width: 700px;">
                            <v-row v-for="(event, index) in events"
                                      :key="index" style="margin-bottom: 40px">
                                <v-col xs3 sm2 class="eventDate">
                                    {{getDayOfWeek(event.date)}} <br> {{event.date}}
                                </v-col>
                                <v-col xs9 sm10 class="eventName">
                                    {{event.name}}
                                </v-col>
                                <v-col xs1 sm2></v-col>
                                <v-col xs11 sm10 class="eventDescription">{{event.description}}</v-col>
                                <v-col cols="12" sm12 class="eventImageContainer">
                                    <img
                                            v-if="event.storageLabel"
                                            :src="'/storage' + event.storageLabel.substring('public'.length)"
                                            alt=""
                                            class="eventImage"
                                    >
                                </v-col>
                                <hr style="width: 90%; margin-top: 20px">
                            </v-row>
                            <v-row v-if="showLoadMore()" justify="center">
                                <v-btn text @click.native="loadMoreDocuments()">
                                    Load More
                                    <v-icon>expand_more</v-icon>
                                </v-btn>
                            </v-row>
                        </v-container>
                    </v-card>
                </v-row>
                <pageFooter></pageFooter>
            </v-container>
        </v-app>
    </div>
</template>

<script>
    export default {
        data: () => ({
            events: [],
            data: {}
        }),
        created() {
            axios.get('/events/LiveMusic')
                .then(response => {
                    this.events = response.data.data;
                    this.data = response.data
                })
        },
        methods: {
            getDayOfWeek(date) {
                let d = date.split('-');
                let day = new Date(parseInt(d[0]), parseInt(d[1]) - 1, parseInt(d[2]));
                let weekday = new Array(7);
                weekday[0] = "Sunday";
                weekday[1] = "Monday";
                weekday[2] = "Tuesday";
                weekday[3] = "Wednesday";
                weekday[4] = "Thursday";
                weekday[5] = "Friday";
                weekday[6] = "Saturday";
                return weekday[day.getDay()];
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
