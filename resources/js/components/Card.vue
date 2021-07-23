<template>
    <b-card bg-variant="dark" text-variant="white" class="my-2">
        <card-text />
        <b-button href="#" variant="secondary" class="text-light-info">
            Go somewhere
        </b-button>
        <indecators />
    </b-card>
</template>

<script>
import { Text, Indecators } from "./Card/index.js";

export default {
    components: {
        CardText: Text,
        Indecators
    }
};
</script>

<style></style>
