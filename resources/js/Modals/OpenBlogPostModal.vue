<template>
    <base-modal
        id="openBlogPostModal"
        title="Blog Post"
        size="modal-xl"
        @onshow="onShow"
        @instance="(_) => (modal = _)"
    >
        <div v-if="blogPost" class="row">
            <div
                v-for="image in blogPost.images"
                :key="image.id"
                class="col-12 col-md-6 col-lg-4"
            >
                <div class="ratio ratio-16x9">
                    <img
                        alt="Blog Post image"
                        class="object-fit-cover"
                        :src="image.full_source"
                    />
                </div>
            </div>
        </div>
        <template #footer>
            <input
                ref="filePicker"
                :class="{ 'is-invalid': form.errors.image }"
                type="file"
                @change="uploadImage($event)"
            />
            <div class="invalid-feedback">
                {{ form.errors.image }}
            </div>
        </template>
    </base-modal>
</template>

<script>
export default {
    name: "OpenBlogPostModal",
};
</script>
<script setup>
import BaseModal from "./BaseModal.vue";
import { inject, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

const blogPost = ref(null);

const form = useForm({
    image: null,
    method: "_PUT",
});

const modal = ref(null);

const onShow = (event) => {
    blogPost.value = JSON.parse(
        event.relatedTarget.getAttribute("data-bs-blog-post")
    );
};

const route = inject("route");

const uploadImage = (e) => {
    if (e.target.files[0]) {
        form.image = e.target.files[0];
    }
    form.post(route("blog-posts.upload-image", blogPost.value));
    modal.value.hide();
};
</script>

<style scoped></style>
