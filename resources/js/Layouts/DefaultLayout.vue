<template>
    <custom-navbar />
    <custom-alert />
    <slot></slot>
</template>

<script>
export default {
    name: "DefaultLayout",
};
</script>
<script setup>
import CustomNavbar from "../Components/Layouts/CustomNavbar.vue";
import CustomAlert from "../Components/CustomAlert.vue";
</script>

<style scoped></style>
