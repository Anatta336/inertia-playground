<script setup>
import { computed } from 'vue';

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

const formattedPrice = computed(() => {
    return `£${(props.product.net_pence / 100).toFixed(2)}`;
});

</script>

<template>
    <tr>
        <td>{{ product.name }}</td>
        <td>{{ formattedPrice }}</td>
    </tr>
</template>

<style scoped lang="scss">

</style>
