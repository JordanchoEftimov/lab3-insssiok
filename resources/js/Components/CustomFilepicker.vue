<template>
    <div>
        <label :for="id" class="form-label">
            {{ label }}
        </label>
        <input
            :id="id"
            :class="{ 'is-invalid': error }"
            class="form-control"
            type="file"
            :name="id"
            :multiple="multiple"
            @change="handleChange"
        />
        <div class="invalid-feedback">{{ error }}</div>
    </div>
</template>

<script>
export default {
    name: "CustomFilepicker",
};
</script>
<script setup>
const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    id: {
        type: String,
        required: true,
    },
    multiple: {
        type: Boolean,
        default: false,
    },
    error: {
        type: String,
        default: null,
    },
});

const emit = defineEmits(["change"]);

const handleChange = (event) => {
    const files = event.target.files;

    if (!files.length) emit("change", props.multiple ? [] : null);

    emit("change", props.multiple ? files : files[0]);
};
</script>

<style scoped></style>
