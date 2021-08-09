<template>
    <b-container class="py-3">
        <b-card bg-variant="dark" text-variant="white" class="my-2">
            <div>
                <slider />
            </div>
            <card-text />
            <b-row>
                <indecators class="col-6" />

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
