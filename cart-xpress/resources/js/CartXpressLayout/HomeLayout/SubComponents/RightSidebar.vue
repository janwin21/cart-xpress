<template>
    <!-- right side bar -->
    <div class="right-slidebar col-3 ps-2 pe-0 text-end text-light">

        <RandomProductLink :product="_.sample(products)" />

        <!-- another random product -->
        <div class="mt-2 px-2" 
             style="height: 150px; overflow: hidden;">

            <div class="row">

                <template v-for="product in _.slice(_.shuffle(products), 0, 3)" 
                          :key="product.id">

                    <div class="col-4 p-0 pe-1">

                        <Link href="#" :id="product.id">
                            <img class="w-100 h-100 p-0" 
                                 :src="product.imagePath" alt="random product image">
                        </Link>

                    </div>

                </template>
                
            </div>
        </div>

        <!-- product -->
        <p class="roboto mt-5 text-xpress-gray-300">Related Products</p>

        <!-- display all products related to the category of the random product above -->
        <div class="row row-cols-2 flex-row-reverse g-2 m-0" style="z-index: 1000">

            <template v-for="(product, index) in products" :key="product.id">

                <template v-if="index < 
                          ((counters[0]) ? counters[0] : incrementValue)">

                        <ProductLink :product="product" :blackColor="2" />

                </template>
                
            </template>
            
        </div>

        <template v-if="products.length > 
                        ((counters[0]) ? counters[0] : incrementValue)">

            <button class="btn bg-xpress-gray-200 
                    bg-hover-xpress-to-gray-200 
                    rounded-0 text-light 
                    py-1 px-4 w-100 mt-2
                    fs-xpress-sm-200 fw-xpress-500"
                    data-index="0"
                    @click="load($event)">
                    Load More</button>

        </template>

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import { reactive } from 'vue';

    import RandomProductLink from '../Elements/RandomProductLink.vue';
    import ProductLink from '../Elements/ProductLink.vue'

    import _ from 'lodash';
    import { dynamicCounter } from '../../../Composables/DynamicCounter';

    const initialValue = 4; // initial value for product display
    const { incrementValue, counters, load } = dynamicCounter(initialValue);

    const products = reactive([
        {
            id: 0,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            shop: { id: 1 }
        },
        {
            id: 1,
            name: 'product 02',
            price: 100,
            quantityInStock: 32,
            overallRating: 4.5,
            discount: 0.15,
            description: 'this is a description of sample number 2',
            imagePath: '/images/sample-products/product-2.jpg',
            shop: { id: 2 }
        },
        {
            id: 2,
            name: 'product 03',
            price: 11,
            quantityInStock: 12,
            overallRating: 3,
            discount: 0.1,
            description: 'this is a description of sample number 3',
            imagePath: '/images/sample-products/product-3.jpg',
            shop: { id: 3 }
        },
        {
            id: 3,
            name: 'product 04',
            price: 10000,
            quantityInStock: 90,
            overallRating: 1.5,
            discount: 0.08,
            description: 'this is a description of sample number 4',
            imagePath: '/images/sample-products/product-4.jpg',
            shop: { id: 1 }
        },
        {
            id: 4,
            name: 'product 05',
            price: 1255,
            quantityInStock: 12,
            overallRating: 5,
            discount: 0.1,
            description: 'this is a description of sample number 5',
            imagePath: '/images/sample-products/product-5.jpg',
            shop: { id: 1 }
        },
        {
            id: 5,
            name: 'product 06',
            price: 10,
            quantityInStock: 11,
            overallRating: 2,
            discount: 0.11,
            description: 'this is a description of sample number 6',
            imagePath: '/images/sample-products/product-6.jpg',
            shop: { id: 2 }
        },
        {
            id: 0,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            shop: { id: 1 }
        },
        {
            id: 1,
            name: 'product 02',
            price: 100,
            quantityInStock: 32,
            overallRating: 4.5,
            discount: 0.15,
            description: 'this is a description of sample number 2',
            imagePath: '/images/sample-products/product-2.jpg',
            shop: { id: 2 }
        },
        {
            id: 2,
            name: 'product 03',
            price: 11,
            quantityInStock: 12,
            overallRating: 3,
            discount: 0.1,
            description: 'this is a description of sample number 3',
            imagePath: '/images/sample-products/product-3.jpg',
            shop: { id: 3 }
        },
        {
            id: 3,
            name: 'product 04',
            price: 10000,
            quantityInStock: 90,
            overallRating: 1.5,
            discount: 0.08,
            description: 'this is a description of sample number 4',
            imagePath: '/images/sample-products/product-4.jpg',
            shop: { id: 1 }
        },
        {
            id: 4,
            name: 'product 05',
            price: 1255,
            quantityInStock: 12,
            overallRating: 5,
            discount: 0.1,
            description: 'this is a description of sample number 5',
            imagePath: '/images/sample-products/product-5.jpg',
            shop: { id: 1 }
        },
        {
            id: 5,
            name: 'product 06',
            price: 10,
            quantityInStock: 11,
            overallRating: 2,
            discount: 0.11,
            description: 'this is a description of sample number 6',
            imagePath: '/images/sample-products/product-6.jpg',
            shop: { id: 2 }
        }
    ]);
</script>

<style lang="scss" scoped>

</style>