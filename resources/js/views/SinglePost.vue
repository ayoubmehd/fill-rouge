<template>
    <b-container class="py-3">
        <b-card bg-variant="dark" text-variant="white" class="my-2">
            <div>
                <slider />
            </div>
            <card-text v-if="post" :content="post.content" />
            <b-row>
                <indecators
                    v-if="post"
                    class="col-6"
                    :post_id="post.id"
                    :icons="post.platforms"
                />
                <div class="actions col-6 d-flex justify-content-end">
                    <b-button v-b-modal.AddComment>
                        <b-icon icon="chat-dots"></b-icon>
                        <span class="d-none d-md-inline-block">
                            Add a comment
                        </span>
                    </b-button>
                </div>
            </b-row>
        </b-card>
        <comments :comments="comments" />
    </b-container>
</template>

<script>
import Slider from "../components/Slider.vue";
import Comments from "../components/Comments/Comments.vue";
import { Text, Indecators } from "../components/Card/index.js";
import { mapState, mapActions } from "vuex";

export default {
    components: {
        Slider,
        CardText: Text,
        Indecators,
        Comments
    },
    computed: {
        ...mapState({
            isLoading: state => state.post.isLoading,
            errors: state => state.post.errors,
            post: state => state.post.post,
            comments: state => state.comment.comments
        })
    },
    methods: {
        ...mapActions(["getSinglePost", "getPostComments"]),
        getComments() {
            const fb = this.post.platforms.filter(
                item => item.platform === "fb"
            );

            this.getPostComments({
                pageId: JSON.parse(fb[0].pivot.metadata).facebook_page_id,
                postId: fb[0].pivot.external_id
            });
        },
        init() {
            this.getSinglePost(this.$route.params.id).then(() => {
                this.getComments();
            });
        }
    },
    mounted() {
        this.init();
    }
};
</script>

<style></style>
