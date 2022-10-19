<template>
    <template v-for="(category, index) in categories" :key="category.id">

        <!-------------------------------- Main Product Inside Category START -->
        <div class="cart-xpress-category 
                    row bg-xpress-gray-200 mt-2">

            <!-- category header -->
            <div class="pt-2 ps-2"
                style="z-index: 1000">

                <h5 class="roboto fs-xpress-sm-400 
                        text-light p-2 w-25">
                        {{ category.name.toUpperCase() }} {{ call }}</h5>
            </div>

            <!-- category content -->
            <div class="row row-cols-6 
                        m-0 g-1 p-2"
                        style="z-index: 1000">

                <template v-for="(product, productIndex) in category.products" :key="product.id">

                    <template v-if="productIndex < 
                                    ((counters[index]) ? counters[index] : incrementValue)">

                        <ProductLink :product="product" />

                    </template>
                    
                </template>
            </div>

            <template v-if="category.products.length > 
                            ((counters[index]) ? counters[index] : incrementValue)">

                <!-- shop load more button -->
                <div class="px-2 pb-2" style="z-index: 1000">

                    <button class="btn bg-xpress-purple-100 w-100
                                bg-hover-xpress-to-gray-200
                                rounded text-light py-1 px-4 roboto
                                fs-xpress-sm-200 fw-xpress-500"
                                :data-index="index"
                                @click="load($event)">
                                Load More</button>
                </div>
                
            </template>

            <!-- category background of a certain product -->
            <div class="category-background h-50 p-0" 
                style="z-index: 0">

                <img class="w-100 h-100" 
                    style="z-index: -1"
                    :src="category.imagePath" 
                    alt="catergory images">

                <div class="cover w-100 h-100 
                            gradient-black-op-100-to-bg-gray-200"></div>
            </div>

        </div>
        <!---------- Main Product Inside Category END -->
        
    </template>
</template>

<script setup>
    import ProductLink from '../Elements/ProductLink.vue';
    import { ref, reactive, inject } from 'vue';

    import _ from 'lodash';
    import { dynamicCounter } from '../../../Composables/DynamicCounter';

    const initialValue = 6; // initial value for product display
    const { incrementValue, counters, load } = dynamicCounter(initialValue);

    const call = inject('call');

    const categories = reactive(_.filter([
        {
            id: 0,
            name: 'car',
            imagePath: '/images/sample-categories/car.jpg',
            products: [
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                }
            ]
        },
        {
            id: 1,
            name: 'kitchen',
            imagePath: '/images/sample-categories/kitchen.jpg',
            products: []
        },
        {
            id: 2,
            name: 'bike',
            imagePath: '/images/sample-categories/bike.jpg',
            products: []
        },
        {
            id: 3,
            name: 'tools',
            imagePath: '/images/sample-categories/tools.webp',
            products: [
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                },
                {
                    id: 1,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 2,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-3.jpg'
                },
                {
                    id: 3,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 4,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-5.jpg'
                },
                {
                    id: 5,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-6.jpg'
                },
                {
                    id: 6,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                },
                {
                    id: 7,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                }
            ]
        },
        {
            id: 4,
            name: 'appliances',
            imagePath: '/images/sample-categories/appliances.webp',
            products: []
        },
        {
            id: 5,
            name: 'toy',
            imagePath: '/images/sample-categories/toy.jpg',
            products: [
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg'
                },
                {
                    id: 0,
                    name: 'product 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg'
                }]
        }
    ], category => category.products.length > 0 ));

</script>

<style lang="scss" scoped>

</style>