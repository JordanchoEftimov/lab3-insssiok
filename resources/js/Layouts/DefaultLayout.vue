<template>
    <custom-navbar />
    <slot></slot>
</template>

<script>
export default {
    name: "DefaultLayout",
};
</script>
<script setup>
import CustomNavbar from "../Components/Layouts/CustomNavbar.vue";
</script>

<style scoped></style>
