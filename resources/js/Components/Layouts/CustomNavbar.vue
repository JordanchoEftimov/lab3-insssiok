<template>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <Link class="navbar-brand" :href="route('homepage')">Homepage</Link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNav" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <div v-for="(link, i) in links" :key="i">
                        <Link
                            v-if="link.show"
                            class="nav-item"
                            :href="route(link.route)"
                            :method="link.method"
                        >
                            <a class="nav-link" href="#">{{ link.name }}</a>
                        </Link>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "CustomNavbar",
};
</script>
<script setup>
import { inject } from "vue";
import { useBase } from "../../Mixins/useBase";

const route = inject("route");
const { user } = useBase();

const links = [
    {
        name: "Homepage",
        route: "homepage",
        show: true,
        method: "GET",
    },
    {
        name: "All Posts",
        route: "blog-posts.index",
        show: true,
        method: "GET",
    },
    {
        name: "Login",
        route: "show_login",
        show: user.value === null,
        method: "GET",
    },
    {
        name: "Logout",
        route: "logout",
        show: user.value !== null,
        method: "POST",
    },
];
</script>

<style scoped></style>
