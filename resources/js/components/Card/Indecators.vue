<template>
    <span>
        <span v-for="icon in icons">
            <b-button :id="`${icon.name}-${post_id}`">
                <b-icon :icon="icon.name"></b-icon>
            </b-button>
            <b-tooltip :target="`${icon.name}-${post_id}`">
                <b-badge> Likes {{ facebook.like_count }} </b-badge>
                <b-badge> Comments {{ facebook.comments_count }} </b-badge>
            </b-tooltip>
        </span>
    </span>
</template>

<script>
export default {
    name: "indecators",
    props: {
        linkedin: {
            type: Object,
            default: () => ({
                like_count: 0,
                comments_count: 0
            })
        },
        facebook: {
            type: Object,
            default: () => ({
                like_count: 0,
                comments_count: 0
            })
        },
        post_id: Number,
        icons: {
            type: Array,
            default: () => []
        }
    }
};
</script>

<style></style>
