<template>
    <!-- left content -->
    <div class="col-7 p-0 pt-2 pe-2 h-100">
        <div class="shop-content h-100
                    bg-xpress-gray-200 rounded-top">

            <!-- cateogory title header -->
            <div class="shop-content__header 
                px-3 pb-1 pt-3 border-1 
                border-bottom border-light">

                <h5 class="text-light roboto w-100 
                    fs-xpress-sm-500 
                    d-flex flex-row justify-content-between align-items-center">

                    <span>Top Categories</span>

                    <img class="float-end" 
                         src="/images/icons/input-icon-2.png" alt="" 
                         style="width: 1.5em;">
                </h5>

            </div>

            <!-- category content -->
            <div class="shop-content__category bg-light px-2">
                
                <div class="row row-cols-5 px-1 h-100">
                    
                    <template v-for="category in categories" :key="category.categoryID">

                        <CategoryLink :categoryID="category.categoryID"
                            :name="category.name" 
                            :backgroundImagePath="category.backgroundImagePath"/>

                    </template>
                    
                </div>

            </div>

            <!-- category footer -->
            <div class="shop-content__footer 
                        bg-xpress-gray-200 px-2 
                        d-flex justify-content-between align-items-center"
                 id="category-footer">

                <!--
                <button class="btn bg-xpress-purple-100
                            bg-hover-xpress-to-gray-200
                            rounded text-light py-1 px-4 roboto
                            fs-xpress-sm-200 fw-xpress-500">
                            Previous</button>

                <button class="btn bg-xpress-orange-100
                            bg-hover-xpress-to-gray-200
                            rounded text-light py-1 px-4 roboto
                            fs-xpress-sm-200 fw-xpress-500">
                            Next</button>-->
            </div>

        </div>
    </div>
</template>

<script setup>
    import CategoryLink from '../Elements/CategoryLink.vue';
    import { reactive, inject } from 'vue';

    const categories = inject('topCategories');

</script>

<style lang="scss" scoped>

</style>