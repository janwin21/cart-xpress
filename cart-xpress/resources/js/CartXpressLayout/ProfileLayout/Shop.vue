<template>
    <!-- shops containers -->
    <div class="shopping-cart-row mt-4">
    
        <button class="dropdown-btn btn bg-xpress-pink-100 w-25 text-end
            bg-hover-xpress-to-gray-200
            rounded-0 text-light py-1 ps-4 roboto
            fs-xpress-sm-300 fw-xpress-500"
            data-index="2">
            SHOPS</button>

        <div class="order-wrapper" style="display: none;">
            
            <!-- search header -->
            <div class="rounded-top row g-1 p-3">

                <!-- search -->
                <div class="col-6">
                    <div class="form-control p-0 rounded-0 border-0">

                        <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                            for="search">SEARCH 
                            <span class="text-xpress-red-200 
                                roboto fw-xpress-900">*</span></label>

                        <input class="roboto text-xpress-gray-100 
                            bg-light border-0 py-1 fw-xpress-500
                            fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                            name="search" v-model="searchProductValue" />
                    </div>
                </div>
            
                <!-- sorted components for right -->
                <div class="sorted-component col-6">

                    <p class="roboto fs-xpress-sm-200 
                        fw-xpress-700 text-light mb-1">
                        Sorted By:</p>

                    <div class="sorted-buttons">

                        <div class="row m-0 g-1">
                            <div class="col-3">
        
                                <button class="btn bg-xpress-purple-100 w-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 mt-1"
                                    @click="dynamicSortBy(
                                        [{ shops: props.shops }], 'shops', 
                                        property = 'name', orderedThrough)">
                                    Alphabet</button>
                            </div>
                            
                            <div class="col-3">
        
                                <button class="btn bg-xpress-purple-100 w-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 mt-1"
                                    @click="dynamicSortBy(
                                        [{ shops: props.shops }], 'shops', 
                                        property = 'createdAt', orderedThrough)">
                                    Recent</button>
                            </div>
                            
                            <div class="col-3">
        
                                <button class="btn bg-xpress-red-100 w-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 mt-1"
                                    @click="dynamicSortBy(
                                        [{ shops: props.shops }], 'shops', 
                                        property, orderedThrough = 'asc')">
                                    ASC</button>
                            </div>
                            
                            <div class="col-3">
        
                                <button class="btn bg-xpress-green-100 w-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 mt-1"
                                    @click="dynamicSortBy(
                                        [{ shops: props.shops }], 'shops', 
                                        property, orderedThrough = 'desc')">
                                    DESC</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- shop content - customer -->
            <div class="mx-3">
                <div class="row row-cols-3 m-0 g-1">
                    
                    <template v-for="shop in filterItems(searchProductValue, props.shops)" :key="shop.id">

                        <ShopCard :shop="shop" />

                    </template>

                </div>
                
            </div>

        </div>

    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';
    import ShopCard from './Elements/ShopCard.vue';
    import { dynamicSort } from '../../Composables/DynamicSort';
    import { dynamicFilter } from '../../Composables/DynamicFilter';

    const props = defineProps({
        shops: Array
    });

    // DYNAMIC SORTS
    const { property, orderedThrough, dynamicSortBy } = dynamicSort();
    const { filterItems } = dynamicFilter();

    // SEARCH
    const searchProductValue = ref('');
    watch(searchProductValue, value => { searchProductValue.value = value; });

</script>

<style lang="scss" scoped>

</style>