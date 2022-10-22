<template>         
    <!-- category item -->
    <div class="col">

        <Link class="text-xpress-gray-100" :href="route('products.show', props.product.id)"
                style="text-decoration: none;">

            <div class="card rounded-0 border-0 h-100">

                <img :src="props.product.imagePath" 
                     class="card-img-top rounded-0" 
                     alt="product image" 
                     style="height: 200px;">

                <div :class="`card-body bg-xpress-gray-${
                        (props.blackColor) ? props.blackColor : 1
                      }00 p-2`">

                    <p class="text-overflow card-title 
                            roboto text-light fs-xpress-sm-300">
                            {{ props.product.name }}</p>

                    <p class="card-text roboto 
                            text-xpress-orange-200 fs-xpress-sm-700 
                            fw-xpress-600 mb-0">
                            P{{ props.product.price }}</p>

                    <div class="mt-0 p-0 fs-xpress-sm-200 
                                d-flex justify-content-between align-items-start">

                        <p class="card-text text-xpress-yellow-200">
                                <i class="fa-solid fa-star"></i> 
                                {{ props.product.overallRating }}</p>

                        <p class="card-text text-light 
                                text-xpress-yellow-100 fw-xpress-500">
                                {{ props.product.discount * 100 }}% discount</p>
                    </div>

                    <p class="card-text text-xpress-gray-300 
                            fw-xpress-400 fs-xpress-sm-300">
                            available: {{ props.product.quantityInStock }}</p>
                </div>
            </div>

        </Link>

        <slot />

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import moment from 'moment';
    import Route from '../../../../../vendor/tightenco/ziggy/src/js/Route';

    const props = defineProps({
        product: Object,
        blackColor: Number,
        height: Number
    });

</script>

<style lang="scss" scoped>

</style>