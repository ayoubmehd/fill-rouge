<template>
    <div>
        Home
    </div>
</template>

<script>
import { mapState } from "vuex";

export default {
    data() {
        return {
            ...mapState(["example"])
        };
    }
};
</script>

<style></style>
