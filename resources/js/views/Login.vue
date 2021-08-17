<template>
    <b-container>
        <b-row align-h="center" align-v="center" class="vh-100">
            <b-col cols="md-5" class="h-75 d-flex align-items-center">
                <b-card bg-variant="dark" text-variant="white" class="w-100">
                    <b-card-title>
                        <h1>Login</h1>
                    </b-card-title>
                    <b-form @submit.prevent="submit">
                        <b-form-group
                            id="email-group"
                            label="Your Email:"
                            label-for="email"
                        >
                            <b-form-input
                                id="email"
                                v-model="form.email"
                                placeholder="Enter Email"
                                required
                            ></b-form-input>
                        </b-form-group>
                        <b-form-group
                            id="passowrd-group"
                            label="Your Password:"
                            label-for="password"
                        >
                            <b-form-input
                                id="password"
                                v-model="form.password"
                                placeholder="Enter Password"
                                type="password"
                                required
                            ></b-form-input>
                        </b-form-group>
                        <b-button type="submit">Login</b-button>
                    </b-form>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: ""
            }
        };
    },
    methods: {
        async submit() {
            await this.$store.dispatch("login", this.form);
            if (!this.$store.state.auth.errors) {
                this.$router.push({ name: "Home" });
            }
        }
    },
    mounted() {}
};
</script>

<style></style>
