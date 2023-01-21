<template>
    <div></div>
</template>

<script>
export default {
    name: "Index",
};
</script>
<script setup>
defineProps({
    blogPosts: {
        type: Object,
        default: null,
    },
});
</script>

<style scoped></style>
