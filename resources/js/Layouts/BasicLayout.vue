<script setup>
import SideMenuLink from './Partials/SideMenuLink.vue';
import SideMenuTop from './Partials/SideMenuTop.vue';
import { ref } from 'vue';

defineProps({
    verticalCenterContent: {
        type: Boolean,
        default: false,
    },
    horizontalCenterContent: {
        type: Boolean,
        default: false,
    },
});

const isMenuExpanded = ref((localStorage.getItem('menuExpanded') ?? 'true') == 'true');

function toggleMenu() {
    isMenuExpanded.value = !isMenuExpanded.value;
    localStorage.setItem('menuExpanded', isMenuExpanded.value);
}
</script>

<template>
    <div class="app">
        <nav :class="{ isExpanded: isMenuExpanded }">
            <SideMenuTop
                label="Example Ltd."
                :isMenuExpanded="isMenuExpanded"
                @toggle-menu="() => toggleMenu()"
            />
            <hr>
            <SideMenuLink
                href="/products"
                label="Products"
                icon="shopping_cart"
                :showLabel="isMenuExpanded"
            />
        </nav>

        <div
            class="content"
            :class="{
                'vertical-center': verticalCenterContent,
                'horizontal-center': horizontalCenterContent,
            }"
        >
            <slot></slot>
        </div>
    </div>
</template>

<style scoped lang="scss">
.app {
    display: flex;
    flex-direction: row;
    height: 100vh;
    width: 100vw;
}

nav {
    display: flex;
    flex-direction: column;

    background-color: #333;
    color: white;
    padding: 0.5rem 1rem;

    width: 200px;

    transition: 300ms;

    &:not(.isExpanded) {
        width: 30px;
        padding: 0.5rem 0.1rem;
    }
}

.content {
    min-height: 100vh;
    overflow-y: auto;
    flex: 1;

    display: flex;
    flex-direction: column;

    &.vertical-center {
        justify-content: center;
    }
    &.horizontal-center {
        align-items: center;
    }
}
</style>