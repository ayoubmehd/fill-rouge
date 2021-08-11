<template>
    <b-container class="py-3">
        <b-card bg-variant="dark" text-variant="white" class="my-2">
            <card-text />
            <b-button href="#" variant="secondary" class="text-light-info">
                Go somewhere
            </b-button>
            <indecators />
        </b-card>
    </b-container>
</template>

<script>
import Text from "../components/Card/Text.vue";
import Indecators from "../components/Card/Indecators.vue";

export default {
    components: {
        CardText: Text,
        Indecators
    }
};
</script>

<style></style>
