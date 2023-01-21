<template>
    <div
        class="container py-4 min-vh-100 d-flex align-items-center justify-content-center"
    >
        <div class="col col-12 col-md-6 col-lg-5">
            <div class="card shadow-lg">
                <div class="card-body p-md-5 text-center">
                    <h2 class="display-6 fw-bold mb-4">Најави се</h2>
                    <form @submit.prevent="login">
                        <base-input
                            v-model:value="form.email"
                            class="mb-3"
                            name="email"
                            label="Е-пошта"
                            :invalid="form.errors.email"
                        />
                        <base-input
                            v-model:value="form.password"
                            class="mb-3"
                            name="password"
                            type="password"
                            label="Лозинка"
                            :invalid="form.errors.password"
                        />
                        <button
                            :disabled="form.processing"
                            type="submit"
                            class="btn btn-primary text-white"
                        >
                            Најави се
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DefaultLayout from "../../Layouts/DefaultLayout.vue";

export default {
    name: "Login",
    layout: DefaultLayout,
};
</script>
<script setup>
import { inject } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BaseInput from "../../Components/BaseComponents/BaseInput.vue";

const route = inject("route");

const form = useForm({
    email: "",
    password: "",
});

const login = () => {
    form.post(route("login"));
};
</script>

<style scoped></style>
