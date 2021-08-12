<template>
    <b-container class="py-3">
        <b-card
            v-for="post in posts"
            :key="post.id"
            bg-variant="dark"
            text-variant="white"
            class="my-2"
        >
            <card-text :content="post.content" />
            <b-button
                :to="{ name: 'SinglePost', params: { id: post.id } }"
                variant="secondary"
                class="text-light-info"
            >
                Go somewhere
            </b-button>
            <indecators :post_id="post.id" :icons="post.platforms" />
        </b-card>
    </b-container>
</template>

<script>
import Text from "../components/Card/Text.vue";
import Indecators from "../components/Card/Indecators.vue";
import { mapState, mapActions } from "vuex";

export default {
    components: {
        CardText: Text,
        Indecators
    },
    computed: {
        ...mapState({
            isLoading: state => state.post.isLoading,
            errors: state => state.post.errors,
            posts: state => state.post.posts
        })
    },
    methods: {
        ...mapActions(["getAllPosts"])
    },
    mounted() {
        this.getAllPosts();
    }
};
</script>

<style></style>
