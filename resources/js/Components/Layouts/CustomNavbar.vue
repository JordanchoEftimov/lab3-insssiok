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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <Link
                        v-for="(link, i) in links"
                        :key="i"
                        class="nav-item"
                        :href="route(link.route)"
                    >
                        <a class="nav-link" href="#">{{ link.name }}</a>
                    </Link>
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

const route = inject("route");

const links = [
    {
        name: "Homepage",
        route: "homepage",
    },
    {
        name: "All Posts",
        route: "blog-posts.index",
    },
];
</script>

<style scoped></style>
