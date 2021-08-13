<template>
    <div>
        <b-card bg-variant="dark" text-variant="white" class="mb-4">
            <!-- <b-img
                left
                rounded="circle"
                src="https://picsum.photos/125/125/?image=58"
                alt="Left image"
                class="mx-2"
            ></b-img> -->
            <card-text :content="comment.message" />
            <b-row>
                <indecators
                    :icons="[{ name: 'facebook' }]"
                    :post_id="comment.id"
                    class="col-6"
                />

                <div class="actions col-6 d-flex justify-content-end">
                    <b-button v-b-modal.AddComment>
                        <b-icon icon="chat-dots"></b-icon>
                        <span class="d-none d-md-inline-block">
                            Replay
                        </span>
                    </b-button>
                </div>
            </b-row>
        </b-card>
    </div>
</template>

<script>
import { Text, Indecators } from "../Card/index.js";

export default {
    components: {
        CardText: Text,
        Indecators
    },
    props: {
        comment: {
            type: Object,
            default: () => ({})
        }
    }
};
</script>

<style></style>
