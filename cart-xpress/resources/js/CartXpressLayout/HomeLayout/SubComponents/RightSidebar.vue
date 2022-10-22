<template>
    <!-- right side bar -->
    <div class="right-slidebar col-3 ps-2 pe-0 text-end text-light">

        <RandomProductLink :product="_.sample(randomProducts)" />

        <!-- another random product -->
        <div class="mt-2 px-2" 
             style="height: 150px; overflow: hidden;">

            <div class="row">

                <template v-for="product in _.slice(_.shuffle(randomProducts), 0, 3)" 
                          :key="product.id">

                    <div class="col-4 p-0 pe-1">

                        <Link :href="route('products.show', product.id)">
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

            <template v-for="(product, index) in randomProducts" :key="product.id">

                <template v-if="index < 
                          ((counters[0]) ? counters[0] : incrementValue)">

                        <ProductLink :product="product" :blackColor="2" />

                </template>
                
            </template>
            
        </div>

        <template v-if="randomProducts.length > 
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
    import { inject } from 'vue';

    import RandomProductLink from '../Elements/RandomProductLink.vue';
    import ProductLink from '../Elements/ProductLink.vue'

    import _ from 'lodash';
    import { dynamicCounter } from '../../../Composables/DynamicCounter';

    const initialValue = 4; // initial value for product display
    const { incrementValue, counters, load } = dynamicCounter(initialValue);

    const randomProducts = inject('productsInRandomCategory').products;
</script>

<style lang="scss" scoped>

</style>