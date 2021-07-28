<template>
    <form @submit.prevent="submit" action="">
        <input type="email" v-model="form.email" placeholder="Email" />
        <input type="password" v-model="form.password" placeholder="Password" />
        <button type="submit">Login</button>
    </form>
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
        submit() {
            this.$store.dispatch("login", this.form);
        }
    }
};
</script>

<style></style>
