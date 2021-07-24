<template>
    <b-container>
        <b-form @submit.prevent="addPost">
            <b-form-group
                id="input-group-1"
                label="Content:"
                label-for="content"
            >
                <b-form-textarea
                    id="content"
                    v-model="form.content"
                    placeholder="Enter post content..."
                    rows="3"
                    max-rows="6"
                ></b-form-textarea>
            </b-form-group>

            <b-form-group id="input-group-3" label="Page:" label-for="pages">
                <b-form-select
                    id="pages"
                    v-model="form.page"
                    :options="pages"
                    required
                ></b-form-select>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </b-container>
</template>

<script>
import { mapActions, mapState } from "vuex";
export default {
    data() {
        return {
            form: {
                content: "",
                page: ""
            }
        };
    },
    computed: {
        pages() {
            return this.$store.state.user.pages.map(page => ({
                value: page.id,
                text: page.name
            }));
        },
        ...mapState({
            isLoading: state => state.post.isLoading,
            errors: state => state.post.errors
        })
    },
    methods: {
        ...mapActions(["getUserPages"]),
        addPost() {
            this.$store.dispatch("addPost", this.form);
        }
    },
    mounted() {
        this.getUserPages();
    }
};
</script>

<style></style>
