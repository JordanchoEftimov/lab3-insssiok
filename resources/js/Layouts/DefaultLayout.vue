<template>
    <custom-navbar />
    <custom-alert />
    <slot></slot>
    <open-blog-post-modal />
</template>

<script>
export default {
    name: "DefaultLayout",
};
</script>
<script setup>
import CustomNavbar from "../Components/Layouts/CustomNavbar.vue";
import CustomAlert from "../Components/CustomAlert.vue";
import OpenBlogPostModal from "../Modals/OpenBlogPostModal.vue";
</script>

<style scoped></style>
