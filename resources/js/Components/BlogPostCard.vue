<template>
    <div
        class="card rounded-3 shadow"
        @mouseenter="hover = true"
        @mouseleave="hover = false"
        :class="{ 'shadow-lg': hover }"
    >
        <img
            src="https://autowelt.mk/storage/705905/cc3f8aa0-6290-4d3b-a16b-a5aa4bb6930a.jpg"
            class="card-img-top"
            alt="Blog Post Thumbnail"
        />
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
