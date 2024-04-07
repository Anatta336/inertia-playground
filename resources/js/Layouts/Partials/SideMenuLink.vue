<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
        required: true,
    },
    showLabel: {
        type: Boolean,
        default: true,
    },
});
</script>
<template>
    <Link class="link"
        :href="href"
    >
        <span class="material-symbols-outlined">
            {{ icon }}
        </span>
        <span v-if="showLabel">
            {{ label }}
        </span>
    </Link>
</template>
<style scoped lang="scss">
.link {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;

    padding: 0.5rem 0;
}
</style>
