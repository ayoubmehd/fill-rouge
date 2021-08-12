<template>
    <b-card-text class="mt-2">
        <b-card-title v-if="cardText" class="text-success">
            {{ cardText }}
        </b-card-title>
        {{ content }}
    </b-card-text>
</template>

<script>
export default {
    name: "card-text",
    props: {
        cardText: {
            type: String,
            default: null
        },
        content: {
            type: String,
            default: ""
        }
    }
};
</script>

<style></style>
