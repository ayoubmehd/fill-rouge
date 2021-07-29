<template>
    <div>
        <navbar />
        <sidebar />
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
import Navbar from "../Navbar.vue";
import Sidebar from "../Sidebar.vue";

export default {
    components: {
        Navbar,
        Sidebar
    }
};
</script>

<style></style>
