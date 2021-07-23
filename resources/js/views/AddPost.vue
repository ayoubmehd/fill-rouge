<template>
    <b-container>
        <b-form>
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
export default {
    data() {
        return {
            form: {
                content: "",
                page: ""
            },
            pages: []
        };
    },
    methods: {
        getUserPages() {}
    },
    mounted() {
        this.getUserPages();
    }
};
</script>

<style></style>
