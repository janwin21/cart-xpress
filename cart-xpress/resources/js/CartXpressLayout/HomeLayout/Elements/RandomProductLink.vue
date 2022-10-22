<template>
    <!-- specific random product detail -->
    <Link :href="route('products.show', props.product.id)">
        <img class="w-100" :src="props.product.imagePath" alt="" 
            style="height: 250px; object-fit: cover;" />
    </Link>

    <h5 class="nato-sans-jp mt-3">{{ props.product.name }}</h5>

    <p class="lato text-xpress-yellow-200 
              fs-xpress-sm-400 fw-xpress-400">
              <span class="text-xpress-gray-300 me-3">
                {{ props.product.discount * 100 }}%</span>
              P{{ props.product.price }} price</p>

    <p class="lato justify 
              fs-xpress-sm-300 fw-xpress-200">
              {{ props.product.description }}</p>

    <div class="d-flex justify-content-center align-items-center pt-2">
        <div class="w-100 pe-1">
            <Link class="btn bg-xpress-orange-100 
                           bg-hover-xpress-to-gray-200 
                           rounded-0 text-light py-1 px-4 w-100
                           fs-xpress-sm-200 fw-xpress-500"
                           :id="props.product.shop.id">
                           Visit Shop</Link>
        </div>

        <div class="w-100 ps-1">
            <Link class="btn bg-xpress-purple-300 
                           bg-hover-xpress-to-gray-200 
                           rounded-0 text-light py-1 px-4 w-100
                           fs-xpress-sm-200 fw-xpress-500"
                           :href="route('products.show', props.product.id)">
                           Visit Product</Link>
        </div>
    </div>

    <Link class="btn bg-xpress-red-100 
                   bg-hover-xpress-to-gray-200 
                   rounded-0 text-light py-1 px-4 w-100 mt-2
                   fs-xpress-sm-200 fw-xpress-500"
                   type="button">
                   Add To Cart</Link>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        product: Object
    });

</script>

<style lang="scss" scoped>

</style>