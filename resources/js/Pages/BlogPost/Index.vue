<template>
    <div class="container py-5">
        <div class="text-end">
            <button
                v-if="user"
                data-bs-toggle="modal"
                data-bs-target="#createBlogPostModal"
                class="btn btn-primary mb-4"
            >
                Create new post
            </button>
        </div>
        <div
            v-if="!blogPosts.data.length"
            class="d-flex flex-column align-items-center justify-content-center"
        >
            <div>
                <i class="fa fa-times fa-4x"></i>
            </div>
            <div class="fs-2">There are no blog posts posted yet.</div>
        </div>
        <div v-else class="row">
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
    <create-blog-post-modal />
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
import CreateBlogPostModal from "../../Modals/CreateBlogPostModal.vue";
import { useBase } from "../../Mixins/useBase";

const { user } = useBase();

defineProps({
    blogPosts: {
        type: Object,
        default: null,
    },
});
</script>

<style scoped></style>
