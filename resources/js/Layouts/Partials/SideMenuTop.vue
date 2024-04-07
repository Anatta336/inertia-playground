<script setup>
const props = defineProps({
    label: {
        type: String,
        required: true,
    },
    isMenuExpanded: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits([
    'toggle-menu'
]);

</script>
<template>
    <div class="nav-top">
        <button @click="() => emit('toggle-menu')">
            <span class="material-symbols-outlined">
                {{ isMenuExpanded ? 'menu_open' : 'menu' }}
            </span>
        </button>

        <span v-if="isMenuExpanded"
            class="name"
        >
            {{ label }}
        </span>
    </div>
</template>
<style scoped lang="scss">
.nav-top {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-between;
    align-items: center;
}

.name {
    white-space: nowrap;
}
</style>
