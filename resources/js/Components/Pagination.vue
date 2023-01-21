<template>
    <nav v-if="links.length > 3" aria-label="Page navigation">
        <ul class="pagination justify-content-center mb-0">
            <li
                v-for="(link, k) in links"
                :key="k"
                class="page-item"
                :class="{ active: link.active, disabled: !link.url }"
            >
                <Link
                    v-if="link.url"
                    class="page-link"
                    :href="link.url"
                    tabindex="-1"
                    v-html="link.label"
                >
                </Link>
                <span v-else class="page-link" v-html="link.label"> </span>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
};
</script>
<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    links: {
        type: Array,
        required: true,
    },
});
</script>
<style scoped></style>
