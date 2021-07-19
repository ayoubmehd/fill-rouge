<template>
    <div>
        <navbar />
        <sidebar />
        <main>
            <router-view />
        </main>
    </div>
</template>

<script>
import Navbar from "./components/Layouts/Navbar.vue";
import Sidebar from "./components/Layouts/Sidebar.vue";

export default {
    components: {
        Navbar,
        Sidebar
    }
};
</script>

<style></style>
