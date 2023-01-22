<template>
    <div
        class="card rounded-3 shadow"
        :class="{ 'shadow-lg': hover }"
        @mouseenter="hover = true"
        @mouseleave="hover = false"
    >
        <div class="ratio ratio-16x9">
            <img
                v-if="blogPost.images && blogPost.images.length"
                :src="blogPost.images[0].full_source"
                class="card-img-top object-fit-cover"
                alt="Blog Post Thumbnail"
            />
            <div
                class="h-100 w-100 d-flex align-items-center justify-content-center"
                v-else
            >
                No images yet!!
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">
                {{ blogPost.title }}
            </h5>
            <p class="card-text">
                {{ blogPost.description }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "BlogPostCard",
};
</script>
<script setup>
import { ref } from "vue";

defineProps({
    blogPost: {
        type: Object,
        required: true,
    },
});

const hover = ref(false);
</script>

<style scoped>
.card {
    transition: box-shadow 0.5s;
}
</style>
