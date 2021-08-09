<template>
    <b-container>
        <b-row align-h="center" align-v="center">
            <b-col cols="md-5">
                <b-card
                    bg-variant="dark"
                    text-variant="white"
                    class="h-100"
                    body-class="d-flex justify-content-center"
                >
                    <b-button variant="primary" :href="facebookLoginUrl">
                        <b-icon icon="facebook"></b-icon>
                        Give app facebook access
                    </b-button>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
import axios from "axios";
import { mapState } from "vuex";

export default {
    data() {
        return {
            ...mapState(["example"]),
            facebookLoginUrl: ""
        };
    },
    methods: {
        async getFacebookLoginUrl() {
            const res = await axios.get("/api/facebook/get-login-url");
            this.facebookLoginUrl = res.data.url;
        }
    },
    mounted() {
        this.getFacebookLoginUrl();
    }
};
</script>

<style></style>
