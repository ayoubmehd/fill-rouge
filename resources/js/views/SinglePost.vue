<template>
    <b-container class="py-3">
        <b-card bg-variant="dark" text-variant="white" class="my-2">
            <div>
                <slider />
            </div>
            <card-text />
            <indecators />
        </b-card>
        <comments />
    </b-container>
</template>

<script>
import Slider from "../components/Slider.vue";
import Comments from "../components/Comments/Comments.vue";
import { Text, Indecators } from "../components/Card/index.js";

export default {
    components: {
        Slider,
        CardText: Text,
        Indecators,
        Comments
    }
};
</script>

<style></style>
