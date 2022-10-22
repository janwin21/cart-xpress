<template>
    <!-- a single item -->
    <div class="col-2 p-0 border-bottom-gray-300">

        <img class="w-100" :src="props.product.imagePath" 
            alt="product image" style="height: 375px; object-fit: cover;">
    </div>

    <div class="col-10 p-3 ps-5 border-bottom-gray-300 
                d-flex flex-column justify-content-center">

        <!-- product header -->
        <div class="product-header">

            <h4 class="d-inline roboto text-light 
                        mb-1 fs-xpress-sm-700">
                        {{ props.product.name }}</h4>

            <p class="d-inline roboto mt-0 
                        fs-xpress-sm-200 fw-xpress-500 
                        bg-xpress-purple-300 rounded 
                        px-3 py-1 text-light ms-3">
                        {{ props.product.category.name }}</p>
        </div>

        <!-- upper details -->
        <div class="row p-0 mt-2">
            <div class="col-2">

                <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-400 
                            text-xpress-yellow-200">
                            {{ props.product.overallRating }}</p>
            </div>
            <div class="col-2">

                <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            {{ props.product.countReviews }} REVIEWS</p>
            </div>
            <div class="col-2">

                <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            P{{ props.product.totalPriceSold }} TOTAL SOLD</p>
            </div>
            <div class="col-3">

                <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            POSTED AT {{ moment(props.product.createdAt).format("MMM Do YYYY") }}</p>
            </div>

            <!-- width space -->
            <div class="col-12"></div>

            <!-- details about the ordered item -->
            <div class="col-4 ps-5 mt-5">

                <p class="roboto mt-0 mb-1
                            fs-xpress-sm-300 fw-xpress-500 
                            text-xpress-gray-600">
                            Duration of Service Delivery</p>

                <p class="roboto mt-0 ps-5
                            fs-xpress-sm-300 fw-xpress-500 
                            text-light">
                            {{ props.product.durationOfDeliveryByHour }} Hours</p>
            </div>

            <div class="col-2 mt-5">

                <p class="roboto mt-0
                            fs-xpress-sm-700 fw-xpress-500 
                            text-light">
                            P{{ priceWithDiscount() }}</p>
            </div>

            <!-- quantityInStock -->
            <div class="col-2 mt-5">

                <div class="form-control p-0 pt-1 bg-transparent 
                            border-0 border-light">

                    <input class="w-50 px-3 rounded" 
                        type="number" name="quantityInStock" 
                        v-model="quantity" min="0">
                </div>
            </div>

            <div class="col-2 mt-5">

                <p class="roboto mt-0 pe-1
                            fs-xpress-sm-700 fw-xpress-500 
                            text-light">
                            P{{ updateQuantity }}</p>
            </div>

            <div class="col-2 mt-5 pe-5">

                <button class="btn bg-xpress-red-100
                    bg-hover-xpress-to-gray-200 text-light
                    rounded fs-xpress-sm-100 
                    fw-xpress-600 ms-1"
                    id="background-btn">
                    <i class="fa-solid fa-trash"></i>
                </button>

                <Link class="btn bg-success
                    bg-hover-xpress-to-gray-200 text-light
                    rounded fs-xpress-sm-100 
                    fw-xpress-600 ms-1"
                    :href="route('products.show', props.product.id)"
                    id="background-btn">
                    <i class="fa-solid fa-eye"></i>
                </Link>
            </div>

            <div class="col-4 ps-5 mt-5">

                <p class="roboto mt-0 mb-1
                            fs-xpress-sm-300 fw-xpress-500 
                            text-xpress-gray-600">
                            Available Stock</p>

                <p class="roboto mt-0 ps-5
                            fs-xpress-sm-300 fw-xpress-500 
                            text-light">
                            {{ props.product.quantityInStock }} Remaining</p>
            </div>

            <div class="col-2 mt-5">

                <p class="roboto mt-0
                            fs-xpress-sm-300 fw-xpress-500 
                            text-light">
                            WEIGHT <span class="ms-2 text-xpress-gray-300">
                                {{ props.product.size }}KG</span></p>
            </div>

            <div class="col-2 mt-5">

                <p class="roboto mt-0
                            fs-xpress-sm-300 fw-xpress-500 
                            text-light">
                            DISCOUNT <span class="ms-2 text-xpress-yellow-200">
                                {{ props.product.discount * 100 }}%</span></p>
            </div>
        </div>
    
    </div>
</template>

<script setup>
    import moment from 'moment';
    import { Link } from '@inertiajs/inertia-vue3';
    import { useProduct } from '../../Composables/UseProduct';

    const props = defineProps({
        product: Object
    });

    const { quantity, priceWithDiscount, updateQuantity } = useProduct(props.product);

    quantity.value = props.product.orderDetails.quantityOrdered;

</script>

<style lang="scss" scoped>

</style>