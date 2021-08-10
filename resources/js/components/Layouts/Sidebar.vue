<template>
    <b-sidebar id="main-sidebar" bg-variant="dark" text-variant="light" shadow>
        <b-nav class="mt-5" vertical>
            <b-nav-item :to="{ name: 'Home' }" exact>Home</b-nav-item>
            <b-nav-item :to="{ name: 'Posts' }">Posts</b-nav-item>
            <b-nav-item :to="{ name: 'AddPost' }">Add Post</b-nav-item>
            <b-nav-item :to="{ name: 'AppManagment' }">
                App Managment
            </b-nav-item>
        </b-nav>
    </b-sidebar>
</template>

<script>
export default {};
</script>

<style></style>
