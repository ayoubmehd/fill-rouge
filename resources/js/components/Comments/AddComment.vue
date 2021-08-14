<template>
    <b-modal
        id="AddComment"
        header-bg-variant="dark"
        header-text-variant="white"
        body-bg-variant="dark"
        body-text-variant="white"
        footer-bg-variant="dark"
        footer-text-variant="white"
        title="Add a new Comment"
        v-model="show"
    >
        <b-form @submit.prevent="postComment" id="add-comment-form">
            <b-form-group
                id="content-group"
                label="Content:"
                label-for="content"
            >
                <b-form-textarea
                    id="content"
                    placeholder="Enter comment content..."
                    rows="3"
                    max-rows="6"
                    v-model="comment"
                ></b-form-textarea>
            </b-form-group>
        </b-form>
        <template #modal-footer>
            <b-button
                variant="outline-primary"
                class="float-right"
                @click="show = false"
            >
                Close
            </b-button>
            <b-button
                variant="primary"
                class="float-right"
                type="submit"
                form="add-comment-form"
            >
                Add Comment
            </b-button>
        </template>
    </b-modal>
</template>

<script>
import { mapActions } from "vuex";
export default {
    data() {
        return {
            show: false,
            comment: ""
        };
    },
    methods: {
        ...mapActions(["createComment", "getPostComments", "replyToComment"]),
        async postComment() {
            const post = this.$store.state.post.post;

            if (!post.platforms) return;

            const fb = post.platforms.filter(item => item.platform === "fb");
            const pageId = JSON.parse(fb[0].pivot.metadata).facebook_page_id;

            if (this.$store.state.comment.comment) {
                const commentId = this.$store.state.comment.comment.id;

                await this.replyToComment({
                    pageId,
                    commentId,
                    comment: this.comment
                });
                return;
            }

            const postId = fb[0].pivot.external_id;
            await this.createComment({
                pageId,
                postId,
                comment: this.comment
            });

            this.getPostComments({
                pageId,
                postId
            });
        }
    }
};
</script>

<style></style>
