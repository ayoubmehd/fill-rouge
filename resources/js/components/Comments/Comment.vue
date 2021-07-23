<template>
    <div>
        <b-card bg-variant="dark" text-variant="white" class="my-2">
            <b-img
                left
                rounded="circle"
                src="https://picsum.photos/125/125/?image=58"
                alt="Left image"
                class="mx-2"
            ></b-img>
            <card-text />
            <indecators />
        </b-card>
    </div>
</template>

<script>
import { Text, Indecators } from "../Card/index.js";

export default {
    components: {
        CardText: Text,
        Indecators
    }
};
</script>

<style></style>
