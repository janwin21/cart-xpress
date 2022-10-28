<template>

    <CartXpressAppLayout>

        <!-------------------------------- Product Main Content START -->
        <div class="product-content container-fluid pt-5">

            <ShopDetails :shop="props.shop">

                <template #background-cover>

                    <div class="position-fixed top-0 end-0 w-100 h-100" style="z-index: -1;">
                        <img class="w-100 h-100" 
                            :src="props.shop.backgroundImagePath" alt="shop images">
                    </div>

                </template>

            </ShopDetails>

            <div class="w-100 text-end gradient-black-op-100-to-bg-gray-200 
                    pb-4 pe-3 border-bottom-blue-200">

                <!--
                <a class="btn bg-xpress-red-100
                    bg-hover-xpress-to-gray-200 text-light 
                    rounded py-1 px-5 fs-xpress-sm-300 
                    fw-xpress-500 mt-5 me-1">
                    Delete Shop</a>

                <a class="btn bg-xpress-pink-100
                    bg-hover-xpress-to-gray-200 text-light 
                    rounded py-1 px-5 fs-xpress-sm-300 
                    fw-xpress-500 mt-5 me-1">
                    Edit Shop</a>
                -->

                <Link :href="route('categories.create')"
                    class="btn bg-xpress-orange-100
                    bg-hover-xpress-to-gray-200 text-light 
                    rounded py-1 px-5 fs-xpress-sm-300 
                    fw-xpress-500 mt-5 me-1">
                    Create Category
                </Link>

                <Link :href="route('products.createWithShopID', props.shop.id)"
                    class="btn bg-xpress-purple-300
                    bg-hover-xpress-to-gray-200 text-light 
                    rounded py-1 px-5 fs-xpress-sm-300 
                    fw-xpress-500 mt-5 me-1">
                    New Product</Link>
            </div>

            <!-------------------------------- Vendors Involved START -->  
            <div class="vendors gradient-bg-gray-200-to-bg-red-300-end p-4 w-100 text-end">

                <h4 class="d-inline roboto text-light 
                            mb-1 fs-xpress-sm-500 w-50 text-end">
                            Other Vendors Involved</h4>

                <div class="row g-2 flex-row-reverse mt-4 ps-5">

                    <div class="col-1">
                        <img class="w-100 rounded" 
                            src="/images/alphabetical-profile/a-profile.jpg" 
                            alt="" style="height: 4.5rem;">
                    </div>

                    <div class="col-1">
                        <img class="w-100 rounded" 
                            src="/images/alphabetical-profile/a-profile.jpg" 
                            alt="" style="height: 4.5rem;">
                    </div>

                </div>

            </div>
            <!---------- Vendors Involved END -->
        
            <!-------------------------------- Shop Products in Categories START -->
            <div class="catergories px-2">

                <div class="row px-1">

                    <!-- category left -->
                    <div class="col-9 bg-xpress-gray-200">

                        <MainCategories />
                        
                    </div>

                    <!-- category right -->
                    <div class="col-3 bg-xpress-gray-200 p-0 pt-2">

                        <div class="p-0 position-relative" 
                            style="background: 
                            url('/images/wonderful-images/wonderful-image-2.jpg') no-repeat; 
                            background-size: cover;">
        
                            <div class="w-100 h-100 bg-opaque-xpress-black-200 px-4 pt-4">
            
                                <h5 class="lato text-xpress-blue-300 
                                        fs-xpress-sm-400 fw-xpress-600">
                                        SOLD IN TOTAL</h5>
        
                                <p class="roboto text-light pb-3
                                        fs-xpress-sm-400 fw-xpress-500">
                                        P15,000</p>

                                <!-- CHART SECTION START!!! -->
                                <!-- google charts -->
                                <div class="">
                                    <div class="chart-container">
                                </div></div>

                                <!-- google charts -->
                                <div class="">
                                    <div class="chart-container">
                                </div></div>
                                <!-- CHART SECTION END!!! -->
        
                            </div>

                            <!-- ratings -->
                            <div class="shop-rating position-absolute text-center
                                        top-0 end-0 w-25 bg-xpress-orange-100 text-light">

                                <div class="border border-start-0 
                                            border-top-0 border-bottom-1 
                                            border-end-0 p-2">

                                    <h1 class="roboto fw-xpress-600 mt-2">4.5</h1>
                                </div>
        
                                <p class="roboto text-light mt-3 
                                        fs-xpress-sm-200 fw-xpress-500">
                                        OVERALL RATING</p>
                                
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!---------- Shop Products in Categories END -->

        </div>

    </CartXpressAppLayout>
</template>

<script setup>
    import $ from 'jquery';
    import { Link } from '@inertiajs/inertia-vue3';
    import { ref, reactive, provide, onMounted } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import ShopDetails from '../../CartXpressLayout/ProductLayout/ShopDetails.vue';
    
    // sub components
    import MainCategories from '../../CartXpressLayout/HomeLayout/SubComponents/MainCategories.vue';

    // actions & composables
    import { data } from '../../Composables/Data';
    import { callShop } from '../../Actions/shop';

    const { iterateChart } = callShop();

    const props = defineProps({
        shop: Object,
        categoriesWithProducts: Array,
        hasLogin: Boolean
    });

    provide('hasLogin', reactive(props.hasLogin))
    provide('categoriesWithProducts', props.categoriesWithProducts);

    // SEARCH
    const searchProductValue = ref('');
    provide('searchProductValue', searchProductValue);

    onMounted(() => {

        iterateChart($('.chart-container'), [
            [    
                ['dart', 10],
                ['kik', 12],
                ['as', 34],
                ['sd', 110],
            ],
            [    
                ['dart', 10],
                ['kik', 12],
                ['as', 34],
                ['sd', 110],
            ]
        ]);

    });

</script>

<style lang="scss" scoped>

</style>