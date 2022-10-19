<template>

    <!-- shop content -->
    <div class="shop-content-box row">
        <slot name="main-shop-categories" /> 

        <!-- right content -->
        <div class="col-5 h-100">
            <div class="popular-products m-0 h-100 pt-2">

                <div class="row h-50">

                    <!-- first row left side -->
                    <div class="product-items col-6 h-100 p-0 pe-1">

                        <Link href="#" style="text-decoration: none;" :id="popularProducts[0].id">
                            <img class="w-100" 
                                 :src="popularProducts[0].imagePath" alt="" 
                                 style="height: 60%;">
                                 
                            <div class="w-100 bg-xpress-gray-200 p-2"
                                 style="height: 40%;">

                                <p class="roboto text-light 
                                          fs-xpress-sm-200">
                                          {{ popularProducts[0].name }}</p>

                                <div class="product-detail d-flex 
                                            justify-content-between align-items-end 
                                            p-2 w-100">

                                    <h5 class="roboto text-xpress-orange-200 
                                               m-0 p-0 fs-xpress-sm-900">
                                               P{{ popularProducts[0].price }}</h5>

                                    <p class="roboto text-xpress-gray-300
                                              m-0 fs-xpress-sm-200">
                                              available: {{ popularProducts[0].quantityInStock }}</p>
                                </div>
                            </div>

                        </Link>
                    </div>

                    <!-- first row right side -->
                    <div class="col-6 p-0 ps-1 h-100">

                        <template v-for="popularProduct in [popularProducts[1], popularProducts[2]]"
                                  :key="popularProduct.id">

                            <Link href="#" :id="popularProduct.id">
                                <img class="w-100 h-50 pb-1" 
                                     :src="popularProduct.imagePath" alt="">
                            </Link>

                        </template>

                    </div>

                </div>

                <div class="row h-25 py-2">
                    <div class="col-6 h-100 p-0">

                        <Link href="#" :id="popularProducts[3].id">
                            <img class="w-100 h-100" 
                                 :src="popularProducts[3].imagePath" alt=""></Link>
                    </div>
                    
                    <div class="product-items col-6 p-2 bg-xpress-gray-200">

                        <Link href="#" style="text-decoration: none;">
                            <p class="roboto text-light 
                                      fs-xpress-sm-200">
                                      {{ popularProducts[3].name }}</p>

                            <div class="product-detail d-flex 
                                        justify-content-between align-items-end 
                                        p-2 w-100">

                                <h5 class="roboto text-xpress-orange-200 
                                           m-0 p-0 fs-xpress-sm-900">
                                           P{{ popularProducts[3].price }}</h5>

                                <p class="roboto text-xpress-gray-300
                                          m-0 fs-xpress-sm-200">
                                          available: {{ popularProducts[3].quantityInStock }}</p>
                            </div></Link>

                    </div>
                </div>

                <div class="row h-25">

                    <template v-for="(popularProduct, index) in 
                              [popularProducts[4], popularProducts[5]]"
                              :key="popularProduct.id">

                        <div :class="`col-6 h-100 p-0 p${index === 0 ? 'e' : 's'}-1`">

                            <Link href="#">
                                <img class="w-100 h-100" 
                                     :src="popularProduct.imagePath" alt=""></Link>
                        </div>
                    </template>
                    
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import { reactive } from 'vue';
    
    const popularProducts = reactive([
        {
            id: 0,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            imagePath: '/images/sample-products/product-1.jpg'
        },
        {
            id: 1,
            name: 'product 02',
            price: 100,
            quantityInStock: 32,
            imagePath: '/images/sample-products/product-2.jpg'
        },
        {
            id: 2,
            name: 'product 03',
            price: 11,
            quantityInStock: 12,
            imagePath: '/images/sample-products/product-3.jpg'
        },
        {
            id: 3,
            name: 'product 04',
            price: 10000,
            quantityInStock: 90,
            imagePath: '/images/sample-products/product-4.jpg'
        },
        {
            id: 4,
            name: 'product 05',
            price: 1255,
            quantityInStock: 12,
            imagePath: '/images/sample-products/product-5.jpg'
        },
        {
            id: 5,
            name: 'product 06',
            price: 10,
            quantityInStock: 11,
            imagePath: '/images/sample-products/product-6.jpg'
        }
    ]);

</script>

<style lang="scss" scoped>

</style>