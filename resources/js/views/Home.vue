<template>
    <div>
        <a :href="facebookLoginUrl">Link your facebook account</a>
    </div>
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
