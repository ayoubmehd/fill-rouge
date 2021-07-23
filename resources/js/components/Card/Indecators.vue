<template>
    <span>
        <b-button id="facebook">
            <b-icon icon="facebook"></b-icon>
        </b-button>
        <b-button id="linkedin">
            <b-icon icon="linkedin"></b-icon>
        </b-button>
        <b-tooltip target="facebook">
            <b-badge>
                Likes 2
            </b-badge>
            <b-badge>
                Comments 20
            </b-badge>
        </b-tooltip>
        <b-tooltip target="linkedin">
            <b-badge>
                Likes 2
            </b-badge>
            <b-badge>
                Comments 20
            </b-badge>
        </b-tooltip>
    </span>
</template>

<script>
export default {
    name: "indecators"
};
</script>

<style></style>
