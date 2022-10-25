<template>

    <CartXpressAppLayout>

        <!-------------------------------- Checkout Main Content START -->
        <div class="container-fluid pt-4 px-3 bg-opaque-xpress-black-200">
        
            <!-------------------------------- Checkout Header START -->   
            <div class="checkbox-content container-fluid">

                <div class="row align-items-end">

                    <div class="col-6 bg-xpress-gray-200">

                        <!-- title header -->
                        <div class="title-header p-4">
                            
                            <h2 class="fs-xpress-md-400 lato 
                                    fw-xpress-600 text-light
                                    text-shadow-300 mb-0">
                                    CART <span class="text-xpress-yellow-100">X</span>PRESS</h2>
                
                            <h2 class="fs-xpress-sm-700 fw-xpress-700 
                                    text-xpress-red-100 lato mt-0">
                
                                    Online Shopping Cart</h2>
                
                            <p class="text-light roboto mt-4 w-75">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Dicta, aut. Maxime obcaecati voluptas.</p>
                        </div>

                    </div>

                    <div class="checkout-box col-6 
                                bg-xpress-gray-100 p-3" 
                                style="z-index: 1050;">
            
                        <!-- sorted components -->
                        <div class="sorted-component-wrapper row m-0">
                            <div class="col-12">
                
                                <!-- sorted components for left -->
                                <div class="sorted-component">
                
                                    <p class="roboto fs-xpress-sm-200 
                                        fw-xpress-700 text-light mb-1">
                                        Sorted By:</p>
                
                                    <div class="sorted-buttons mt-0">
                        
                                        <button class="btn bg-xpress-purple-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property = 'name', orderedThrough)">
                                            Alphabet</button>
                        
                                        <button class="btn bg-xpress-purple-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property = 'createdAt', orderedThrough)">
                                            Recent</button>
                        
                                        <button class="btn bg-xpress-purple-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property = 'totalPriceSold', orderedThrough)">
                                            Popularity</button>
                        
                                        <button class="btn bg-xpress-purple-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property = 'price', orderedThrough)">
                                            Price</button>
                        
                                        <button class="btn bg-xpress-purple-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property = 'overallRating', orderedThrough)">
                                            Ratings</button>

                                        <br>
                        
                                        <button class="btn bg-xpress-red-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 mt-1 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property, orderedThrough = 'asc')">
                                            ASC</button>
                        
                                        <button class="btn bg-xpress-green-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 mt-1 me-1"
                                            @click="dynamicSortBy(
                                                [props.category], 'products', 
                                                property, orderedThrough = 'desc')">
                                            DESC</button>
                                    </div>
                                </div>
                
                            </div>
                            
                        </div>

                    </div>

                </div>

            </div>
            <!---------- Checkout Header END -->
        
            <!-------------------------------- Shopping Cart Content START -->  
            <div class="shopping-cart-content bg-xpress-gray-200">
                
                <div class="row m-0 p-3 pt-4">

                    <div class="col-12 bg-xpress-purple-100 rounded py-2 ps-3">

                        <h4 class="d-inline roboto text-light fw-xpress-500
                                    mb-1 fs-xpress-sm-400 w-50 text-end">
                                    {{ props.category.name }}</h4>
                    </div>

                    <!-------------------------------- SHOP Orders Item Content START -->  
                    <!-- a shop header -->
                    <div class="col-12 bg-xpress-gray-100 border-bottom-gray-300 
                                rounded-top mt-4 p-3">

                        <h4 class="d-inline roboto text-light fw-xpress-500
                                    mb-1 fs-xpress-sm-400 w-50 text-end">
                                    Products</h4>
                    </div>

                    <template v-for="product in category.products" 
                        :key="product.id">

                        <ProductOrdered :product="product" />

                    </template>

                    <!-- product description -->
                    <div class="col-12 bg-xpress-purple-300 p-3">

                        <p class="roboto m-0
                            fs-xpress-sm-400 fw-xpress-500 
                            text-light">
                            DESCRIPTION</p>
                    </div>

                    <div class="col-12 bg-xpress-purple-300 p-3 mt-4">

                        <p class="roboto m-0 fs-xpress-sm-400 
                            fw-xpress-400 text-light">{{ props.category.description }}</p>
                    </div>
                    <!---------- SHOP Orders Item Content END -->

                </div>

            </div>
            <!---------- Shopping Cart Content END -->

        </div>
        <!---------- Checkout Main Content END -->

    </CartXpressAppLayout>
</template>

<script setup>
    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import ProductOrdered from '../../CartXpressLayout/CheckoutLayout/ProductOrdered.vue';
    import { provide, reactive } from 'vue';

    // actions & composables
    import callCheckout from '../../Actions/checkout';
    import { dynamicSort } from '../../Composables/DynamicSort';

    callCheckout();

    const props = defineProps({
        category: Array,
        hasLogin: Boolean
    });

    provide('hasLogin', reactive(props.hasLogin))

    // DYNAMIC SORTS
    const { property, orderedThrough, dynamicSortBy } = dynamicSort();

</script>

<style lang="scss" scoped>

</style>