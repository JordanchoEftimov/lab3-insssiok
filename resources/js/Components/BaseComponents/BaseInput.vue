<template>
    <div :class="{ 'd-flex align-items-center gap-2': inline }">
        <label v-if="label" :for="name" class="form-label">{{ label }}</label>
        <div :class="{ 'input-group': icon }">
            <div v-if="icon" class="input-group-prepend">
                <span class="input-group-text"><i :class="icon"></i></span>
            </div>
            <input
                :id="name"
                v-model="_value"
                :type="type"
                :disabled="disabled"
                class="form-control"
                :placeholder="placeholder"
                :aria-label="placeholder"
                :class="{ 'is-invalid': invalid }"
                :max="max !== null ? max : undefined"
                @keyup="emit('keyup')"
                @keydown.enter="emit('onEnter')"
            />
            <div class="invalid-feedback">{{ invalid }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseInput",
};
</script>
<script setup>
import { computed } from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
        default: null,
    },
    value: {
        type: [String, Number],
        default: "",
    },
    placeholder: {
        type: String,
        default: null,
    },
    invalid: {
        type: String,
        default: "",
    },
    type: {
        type: String,
        default: "text",
    },
    label: {
        type: String,
        required: true,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    max: {
        type: Number,
        default: null,
    },
    inline: {
        type: Boolean,
        default: false,
    },
});
const emit = defineEmits(["update:value", "keyup", "onEnter"]);
const _value = computed({
    get() {
        return props.value;
    },
    set(val) {
        emit("update:value", val);
    },
});
</script>

<style scoped></style>
