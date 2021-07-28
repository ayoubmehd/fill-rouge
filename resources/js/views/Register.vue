<template>
    <form @submit.prevent="submit" action="">
        <input type="text" v-model="form.name" placeholder="Name" />
        <input type="email" v-model="form.email" placeholder="Email" />
        <input type="password" v-model="form.password" placeholder="Password" />
        <input
            type="password"
            v-model="form.password_confirmation"
            placeholder="Confirm Password"
        />
        <button type="submit">Login</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: "",
                email: "",
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        submit() {
            this.$store.dispatch("register", this.form);
        }
    }
};
</script>

<style></style>
