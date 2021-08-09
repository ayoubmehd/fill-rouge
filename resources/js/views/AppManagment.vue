<template>
    <b-container>
        <b-row align-h="center" align-v="center" class="vh-70">
            <b-col cols="md-5">
                <b-form @submit.prevent="" class="mb-4">
                    <b-form-group label="App Url:" label-for="app-url">
                        <b-form-input
                            id="app-url"
                            placeholder="https://example.com"
                            rows="3"
                            max-rows="6"
                        ></b-form-input>
                    </b-form-group>
                    <b-button type="submit" variant="primary">Save</b-button>
                </b-form>
                <b-form-group label="Api Token:" label-for="api-token">
                    <b-input-group class="mb-2">
                        <b-input-group-prepend class="text-no-mrgin" is-text>
                            <b-button size="sm">
                                <b-icon icon="clipboard"></b-icon>
                            </b-button>
                        </b-input-group-prepend>
                        <b-form-input
                            id="api-token"
                            disabled
                            type="text"
                            value="dsds"
                        ></b-form-input>
                    </b-input-group>
                </b-form-group>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {};
</script>

<style></style>
