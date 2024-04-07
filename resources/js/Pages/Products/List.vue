<script setup>
import { computed, ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import BasicLayout from '@/Layouts/BasicLayout.vue';
import Card from '@/Components/Card.vue';
import Row from './Row.vue';

const props = defineProps({
    products: {
        type: Array,
        default: () => [],
    },
    totalCount: {
        type: Number,
        default: 0,
    },
    page: {
        type: Number,
        default: 1,
    },
    perPage: {
        type: Number,
        default: 10,
    },
});

const internalPage = ref(props.page);

const maxPage = computed(() => {
    return Math.ceil(props.totalCount / props.perPage);
});

const queryString = computed(() => {
    const params = new URLSearchParams();
    params.set('page', internalPage.value);

    return params.toString();
});

watch(internalPage, (value) => {
    if (value < 1) {
        internalPage.value = 1;
    }

    if (value > maxPage.value) {
        internalPage.value = maxPage.value;
    }

    updateLocation();
});

function updateLocation() {
    router.visit(`${window.location.pathname}?${queryString.value}`, {
        replace: true,
        preserveScroll: true,
        preserveState: true,
    });
}

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
                <table class="products-table">
                    <thead>
                        <tr>
                            <th width="500px">
                                Name
                            </th>
                            <th width="200px">
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <Row v-for="product in products"
                            :key="product.id"
                            :product="product"
                        />
                    </tbody>
                </table>
            </div>
            <template #footer>
                <div class="pagination">
                    <div>
                        Total products: {{ totalCount }}
                    </div>
                    <div>
                        <span>Page:</span>
                        <input type="number" v-model="internalPage" />
                    </div>
                </div>
            </template>
        </Card>
    </BasicLayout>
</template>

<style scoped lang="scss">
.products-table {
    border-collapse: collapse;
    table-layout: fixed;

    th {
        text-align: left;
        padding: 0.1rem 0.5rem;
    }
}

.list-card {
    margin: 1rem 0.5rem;
}
.pagination {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
}
</style>