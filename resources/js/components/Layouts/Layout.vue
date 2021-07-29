<template>
    <div>
        <component :is="layout">
            <slot></slot>
        </component>
    </div>
</template>

<script>
export default {
    computed: {
        layout() {
            const layout = this.$route.meta.layout || "Default";
            return () => import(`./Templates/${layout}.vue`);
        }
    }
};
</script>

<style></style>
