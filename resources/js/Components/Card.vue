<script setup>

const props = defineProps({
    borderRadius: {
        type: String,
        default: '5px',
    },
});

</script>

<template>
    <div class="card" :style="`--border-radius: ${borderRadius}`">
        <header v-if="$slots.header">
            <slot name="header"></slot>
        </header>
        <div class="card-body">
            <slot></slot>
        </div>
        <footer v-if="$slots.footer">
            <slot name="footer"></slot>
        </footer>
    </div>
</template>

<style scoped lang="scss">
.card {
    border: 1px solid #ffffff;
    border-radius: var(--border-radius, 5px);
    background-color: #ccd4e4;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);

    .card-body {
        padding: 0.5rem 1rem;
    }

    header {
        background-color: #9ea9bf;
        padding: 0.5rem 1rem;
        border-bottom: 1px solid #ffffff;

        border-top-left-radius: var(--border-radius, 5px);
        border-top-right-radius: var(--border-radius, 5px);
    }

    footer {
        background-color: #9ea9bf;
        padding: 0.5rem 1rem;
        border-top: 1px solid #ffffff;

        border-bottom-left-radius: var(--border-radius, 5px);
        border-bottom-left-radius: var(--border-radius, 5px);
    }
}
</style>
