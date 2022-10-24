<template>
    <template v-for="(category, index) in categories" :key="category.id">

        <!-------------------------------- Main Product Inside Category START -->
        <div class="cart-xpress-category 
                    row bg-xpress-gray-200 mt-2">

            <!-- category header -->
            <div class="pt-2 ps-2 position-relative"
                style="z-index: 1000">

                <h5 class="roboto fs-xpress-sm-400 
                    text-light p-2 w-25">
                    {{ category.name.toUpperCase() }}</h5>
                          
                <Link class="position-absolute top-0 end-0 m-3
                    text-light nato-sans-jp 
                    fs-xpress-sm-300 align-self-center ms-1 px-5
                    btn bg-success
                    bg-hover-xpress-to-gray-200"
                    :href="route('categories.show', category.id)"
                    style="padding-top: 0.2em; padding-bottom: 0.2em;">
                    Visit</Link>
            </div>

            <!-- category content -->
            <div class="row row-cols-6 
                        m-0 g-1 p-2"
                        style="z-index: 1000">

                <template v-for="(product, productIndex) in 
                                 filterItems(searchProductValue, category.products)" 
                                 :key="product.id">

                    <template v-if="productIndex < 
                                    ((counters[index]) ? counters[index] : incrementValue)">

                        <ProductLink :product="product" />

                    </template>
                    
                </template>
            </div>

            <template v-if="filterItems(searchProductValue, category.products).length > 
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
    import { Link } from '@inertiajs/inertia-vue3';
    import { watch, inject } from 'vue';

    import _ from 'lodash';
    import { dynamicCounter } from '../../../Composables/DynamicCounter';
    import { dynamicFilter } from '../../../Composables/DynamicFilter';

    const initialValue = 6; // initial value for product display
    const { incrementValue, counters, load } = dynamicCounter(initialValue);
    const { filterItems } = dynamicFilter();

    const categories = inject('categoriesWithProducts');
    const searchProductValue = inject('searchProductValue');

</script>

<style lang="scss" scoped>

</style>