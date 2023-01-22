<template>
    <base-modal
        id="createBlogPostModal"
        title="Create a blog post"
        @submit="submit"
        @instance="(_) => (modal = _)"
    >
        <template #default>
            <base-input
                v-model:value="form.title"
                class="mb-3"
                name="title"
                label="Title"
                :invalid="form.errors.title"
            />
            <base-input
                v-model:value="form.description"
                class="mb-3"
                label="Description"
                name="description"
                :invalid="form.errors.description"
            />
            <input
                :class="{ 'is-invalid': form.errors.image }"
                ref="filePicker"
                type="file"
                @change="uploadImage($event)"
            />
            <div class="invalid-feedback">
                {{ form.errors.image }}
            </div>
        </template>
        <template #footer>
            <button
                type="submit"
                class="btn btn-primary text-white"
                :disabled="form.processing"
            >
                <i class="fa fa-save"></i> Креирај
            </button>
        </template>
    </base-modal>
</template>

<script>
export default {
    name: "CreateBlogPostModal",
};
</script>
<script setup>
import { inject, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BaseModal from "./BaseModal.vue";
import BaseInput from "../Components/BaseComponents/BaseInput.vue";

const route = inject("route");
const modal = ref(null);

const form = useForm({
    title: "",
    description: "",
    image: null,
});

const uploadImage = (e) => {
    if (e.target.files[0]) {
        form.image = e.target.files[0];
    }
};

const submit = () => {
    form.post(route("blog-posts.store"), {
        onSuccess: () => {
            modal.value.hide();
            form.reset();
        },
        preserveScroll: true,
    });
};
</script>

<style scoped></style>
