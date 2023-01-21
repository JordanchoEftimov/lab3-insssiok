import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

export function useBase() {
    const user = computed(() => usePage().props.value.user);
    const error = computed(() => usePage().props.value.error);
    const success = computed(() => usePage().props.value.success);

    return {
        user,
        error,
        success,
    };
}
