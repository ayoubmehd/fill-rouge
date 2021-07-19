<template>
    <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-button v-b-toggle.main-sidebar class="bg-dark border-dark px-0">
            <b-icon icon="list" font-scale="2" aria-hidden="true"></b-icon>
        </b-button>
        <b-navbar-brand href="#" class="mx-1">NavBar</b-navbar-brand>
        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto w-50 d-flex flex-row justify-content-end">
            <b-nav-item-dropdown
                class="mx-1"
                menu-class="position-absolute bg-dark"
                right
            >
                <template #button-content>
                    <b-icon icon="plus"></b-icon>
                </template>
                <b-dropdown-item href="#">
                    EN
                </b-dropdown-item>
                <b-dropdown-item href="#">
                    ES
                </b-dropdown-item>
                <b-dropdown-item href="#">
                    RU
                </b-dropdown-item>
                <b-dropdown-item href="#">
                    FA
                </b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown
                class="mx-1"
                menu-class="position-absolute bg-dark text-white"
                variant="dark"
                right
            >
                <!-- Using 'button-content' slot -->
                <template #button-content>
                    <b-icon icon="person-fill"></b-icon>
                </template>
                <b-dropdown-item href="#">
                    Profile
                </b-dropdown-item>
                <b-dropdown-item href="#">
                    Sign Out
                </b-dropdown-item>
            </b-nav-item-dropdown>
        </b-navbar-nav>
    </b-navbar>
</template>

<script>
export default {};
</script>

<style></style>
