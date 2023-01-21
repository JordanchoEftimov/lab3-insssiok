<template>
    <div class="container py-5">
        <div
            class="d-flex flex-column align-items-center justify-content-center"
            v-if="!blogPosts.data.length"
        >
            <div>
                <i class="fa fa-times fa-4x"></i>
            </div>
            <div class="fs-2">There are no blog posts posted yet.</div>
        </div>
        <div class="row" v-else>
            <div
                v-for="blogPost in blogPosts.data"
                :key="blogPost.id"
                class="col-12 col-md-4 mb-4"
            >
                <blog-post-card :blog-post="blogPost" />
            </div>
            <pagination :links="blogPosts.links" />
        </div>
    </div>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout.vue";

export default {
    name: "Index",
    layout: DefaultLayout,
};
</script>
<script setup>
import BlogPostCard from "../../Components/BlogPostCard.vue";
import Pagination from "../../Components/Pagination.vue";

defineProps({
    blogPosts: {
        type: Object,
        default: null,
    },
});
</script>

<style scoped></style>
