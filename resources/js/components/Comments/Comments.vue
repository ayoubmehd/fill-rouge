<template>
    <div>
        <b-row>
            <b-col cols="md-8" class="mt-4 order-1 order-md-0">
                <comment
                    v-for="comment in comments"
                    :key="comment.id"
                    :comment="comment"
                />
            </b-col>
            <b-col
                class="position-sticky position-md-static top-0 left-0 right-0  order-0 order-md-1 mt-4"
            >
                <b-card
                    class="shadow postition-static position-md-sticky top-0 w-100"
                    bg-variant="dark"
                    text-variant="white"
                >
                    <b-form>
                        <b-form-group
                            id="facebook-radio"
                            label="Filter Platforms"
                            v-slot="{ ariaDescribedby }"
                        >
                            <b-form-checkbox-group
                                id="checkbox-group-1"
                                v-model="platforms"
                                :options="options"
                                :aria-describedby="ariaDescribedby"
                                name="flavour-1"
                            ></b-form-checkbox-group>
                        </b-form-group>
                    </b-form>
                </b-card>
            </b-col>
        </b-row>
        <add-comment />
    </div>
</template>

<script>
import Comment from "./Comment.vue";
import AddComment from "./AddComment.vue";

export default {
    components: {
        Comment,
        AddComment
    },
    props: {
        comments: Array
    },
    data() {
        return {
            platforms: ["fb"],
            options: [
                { text: "Facebook", value: "fb" },
                { text: "LinkedIn", value: "in" }
            ]
        };
    }
};
</script>

<style></style>
