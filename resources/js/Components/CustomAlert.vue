<template>
    <div></div>
</template>

<script>
export default {
    name: "CustomAlert",
};
</script>
<script setup>
import { useToast } from "vue-toastification";
import { watch } from "vue";
import { useBase } from "../Mixins/useBase";

const { success, error } = useBase();

watch(
    () => success.value,
    () => {
        if (success.value !== null) successFunc(success.value);
    },
    { deep: true }
);

watch(
    () => error.value,
    () => {
        if (error.value !== null) errorFunc(error.value);
    },
    { deep: true }
);

const errorFunc = (val) => {
    const toast = useToast();
    toast.error(val);
};

const successFunc = (val) => {
    const toast = useToast();
    toast.success(val);
};
</script>

<style scoped></style>
