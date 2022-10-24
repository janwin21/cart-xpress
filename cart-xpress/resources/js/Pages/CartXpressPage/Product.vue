<template>

    <CartXpressAppLayout>

        <!-------------------------------- Shop Main Content START -->
        <div class="product-content container-fluid pt-5 bg-opaque-xpress-black-200">

            <ProductDetails :product="props.product" />

            <ShopDetails :shop="props.product.shop" />

            <ReviewForm :product="props.product" />

            <ProductReviews :reviews="props.product.reviews" />

        </div>
        <!---------- Product Main Content END -->

    </CartXpressAppLayout>
</template>

<script setup>
    import { reactive, provide } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import ProductDetails from '../../CartXpressLayout/ProductLayout/ProductDetails.vue';
    import ShopDetails from '../../CartXpressLayout/ProductLayout/ShopDetails.vue';
    import ReviewForm from '../../CartXpressLayout/ProductLayout/ReviewForm.vue';
    import ProductReviews from '../../CartXpressLayout/ProductLayout/ProductReviews.vue';

    // actions & composables
    import { dynamicSort } from '../../Composables/DynamicSort';

    const { property, orderedThrough, dynamicSortBy } = dynamicSort();

    // DYNAMIC SORTS
    provide('property', property);
    provide('orderedThrough', orderedThrough);
    provide('dynamicSortBy', dynamicSortBy);

    const props = defineProps({
        product: Object
    });

</script>

<style lang="scss" scoped>

</style>