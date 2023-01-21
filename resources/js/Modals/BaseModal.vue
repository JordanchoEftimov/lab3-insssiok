<template>
    <div
        :id="id"
        ref="modalRef"
        class="modal fade"
        tabindex="-1"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered" :class="size">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="title" class="modal-title">{{ title }}</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form @submit.prevent="emit('submit')">
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Затвори
                        </button>
                        <slot name="footer"></slot>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseModal",
};
</script>
<script setup>
import { Modal } from "bootstrap";
import { onMounted, ref } from "vue";

defineProps({
    id: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    size: {
        type: String,
        default: null,
    },
});

const modal = ref(null);
const modalRef = ref(null);

onMounted(() => {
    modal.value = Modal.getOrCreateInstance(modalRef.value);
    modalRef.value.addEventListener("show.bs.modal", (event) => {
        emit("onshow", event);
    });
    emit("instance", modal.value);
});

const emit = defineEmits(["submit", "onshow", "instance"]);
</script>

<style scoped>
.modal-dialog {
    overflow-y: initial !important;
}
.modal-body {
    max-height: calc(100vh - 200px);
    overflow-y: auto;
}
</style>
