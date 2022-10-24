<template>
    <!-------------------------------- SHOP Orders Item Content START -->  
    <!-- a shop header -->
    <div class="col-12 bg-xpress-gray-100 border-bottom-gray-300 
                rounded-top mt-4 p-3">

        <h4 class="d-inline roboto text-light fw-xpress-500
                    mb-1 fs-xpress-sm-400 w-50 text-end">
                    {{ props.shop.name }}</h4>
    </div>

    <template v-for="product in props.shop.products" :key="product.id">

        <ProductOrdered :product="product" :editable="1" />

    </template>

    <!-- a shop visit -->
    <div class="col-12 bg-xpress-purple-300 p-2">

        <Link class="btn bg-xpress-gray-100
            bg-hover-xpress-to-gray-200
            rounded-pill text-light py-1 px-5 roboto
            fs-xpress-sm-300 fw-xpress-500"
            :href="route('shops.show', props.shop.id)">
            Visit Shop
        </Link>

    </div>
    <!---------- SHOP Orders Item Content END -->
</template>

<script setup>
    import { reactive } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';
    import ProductOrdered from './ProductOrdered.vue';

    const props = defineProps({
        shop: Object
    });

</script>

<style lang="scss" scoped>

</style>