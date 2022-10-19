<template>
    <!-- left cart sidebar -->
    <div class="cart-sidebar p-0 col-3 fixed-top slide-it-vertical-left" 
         style="height: 100vh;">

        <div class="wrapper h-100 pe-1">

            <div class="cart-sidebar__content h-100 
                        bg-xpress-gray-200 position-relative">

                <!-- shop cart header -->
                <div class="bg-xpress-orange-100 w-100 pb-1 px-2 pt-2 
                            d-flex justify-content-between align-items-start 
                            position-absolute top-0 start-0"
                            style="height: 40px; z-index: 1050;">

                    <h6 class="lato text-light w-50">
                        <i class="fa-solid fa-cart-shopping me-2"></i>
                        Shopping Cart</h6>

                    <button style="border: none; background-color: transparent;">

                        <i class="fa-solid fa-xmark float-end 
                                  text-light text-hover-xpress-to-black-200 
                                  fs-xpress-sm-500"
                           id="sidebar-close-btn"></i>
                    </button>
                </div>

                <!-- shop cart content -->
                <div class="shop-cart-wrapper h-100" style="padding-top: 40px;">

                    <div class="row row-cols-2 m-0 g-1" 
                         style="z-index: 1000;">
            
                        <!-- diplay all ordered products that has a status of on-cart -->
                        <template v-for="product in products" :key="product.id">

                            <ProductLink :product="product" style="height: 75%;">

                                <div class="form-control bg-xpress-gray-100 pt-0 px-2 pb-2
                                            border-top
                                            border-start-0
                                            border-bottom-0
                                            border-end-0
                                            border-light rounded-0
                                            d-flex justify-content-between align-items-center">

                                    <label class="text-light roboto fs-xpress-sm-200" 
                                        for="quantityOrdered">Quantity</label>

                                    <input class="w-50 mt-2 px-2" 
                                        type="number" 
                                        name="quantityOrdered"
                                        :value="product.orderDetails.quantityOrdered"
                                        min="1">
                                </div>

                                <button class="btn bg-xpress-red-100 w-100
                                            bg-hover-xpress-to-gray-200
                                            rounded-0 text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500">
                                            Remove</button>

                            </ProductLink>

                        </template>

                        <!-- submit or visit section for visiting cart or checking out -->
                        <div class="cart-result-box gradient-black-op-100-to-bg-gray-200 
                        position-absolute bottom-0
                        w-100 text-light">

                        <div class="px-3 pt-3 pb-0 mb-0">
                            <p class="roboto fw-xpress-500">Total Ordered</p>

                            <div class="row">
                                <div class="col-6">
                                    <p class="roboto fs-xpress-sm-200 fw-xpress-300">Quantity: 40 pieces</p>
                                    <p class="roboto fs-xpress-sm-200 fw-xpress-300">Expected Duration on Delivery:</p>
                                </div>
                                <div class="col-6">
                                    <p class="roboto fs-xpress-sm-200 fw-xpress-300">Total: P15,000</p>
                                    <p class="roboto fs-xpress-sm-200 fw-xpress-300">24 hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-end pe-2 pb-2 mt-0">

                            <button class="btn bg-xpress-purple-300
                                        bg-hover-xpress-to-gray-200
                                        rounded-0 text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500">
                                        Visit Cart</button>

                            <button class="btn bg-xpress-orange-100
                                        bg-hover-xpress-to-gray-200
                                        rounded-0 text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500">
                                        Checkout Now</button>

                            </div>

                        </div>
                        
                    </div>

                    <div class="w-100" style="height: 200px;"></div>
                    
                </div>
            
            </div>

        </div>

    </div>
</template>

<script setup>
    import ProductLink from '../Elements/ProductLink.vue';
    import { reactive } from 'vue';
    
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
            orderDetails: { quantityOrdered: 5 }
        },
        {
            id: 1,
            name: 'product 01',
            price: 5445,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-3.jpg',
            orderDetails: { quantityOrdered: 9 }
        },
        {
            id: 2,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-4.jpg',
            orderDetails: { quantityOrdered: 5 }
        },
        {
            id: 3,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            orderDetails: { quantityOrdered: 15 }
        },
        {
            id: 4,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-6.jpg',
            orderDetails: { quantityOrdered: 40 }
        },
        {
            id: 5,
            name: 'product 05',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            orderDetails: { quantityOrdered: 12 }
        }
    ]);
</script>

<style scoped>

</style>