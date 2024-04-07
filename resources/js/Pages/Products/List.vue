<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import Card from '@/Components/Card.vue';
import Row from './Row.vue';

const props = defineProps({
    products: {
        type: Array,
        default: () => [],
    },
});

</script>
<template>
    <BasicLayout
        horizontal-center-content
    >
        <Card class="list-card">
            <template #header>
                <h1>Products</h1>
            </template>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <Row v-for="product in products"
                            :key="product.id"
                            :product="product"
                        >
                        </Row>
                    </tbody>
                </table>
            </div>
        </Card>
    </BasicLayout>
</template>

<style scoped lang="scss">
.list-card {
    margin: 1rem 0.5rem;
}
</style>