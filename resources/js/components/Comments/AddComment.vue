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
        <b-form id="add-comment-form">
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
export default {
    data() {
        return {
            show: false
        };
    }
};
</script>

<style></style>
