<template>
    <div class="container py-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            v-if="!blogPosts.length"
        >
            <div>
                <i class="fa fa-times fa-4x"></i>
            </div>
            <div class="fs-2">There are no blog posts posted yet.</div>
        </div>
        <div class="row" v-else>
            <div
                v-for="blogPost in blogPosts"
                :key="blogPost.id"
                class="col-12 col-md-4 mb-4"
            >
                <blog-post-card :blog-post="blogPost" />
            </div>
        </div>
    </div>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout.vue";

export default {
    name: "Homepage",
    layout: DefaultLayout,
};
</script>
<script setup>
import BlogPostCard from "../Components/BlogPostCard.vue";

defineProps({
    blogPosts: {
        type: Array,
        default: null,
    },
});
</script>

<style scoped></style>
