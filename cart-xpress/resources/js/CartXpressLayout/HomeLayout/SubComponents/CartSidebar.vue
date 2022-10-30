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

                        <template v-for="shop in shops" :key="shop.id">
            
                            <!-- diplay all ordered products that has a status of on-cart -->
                            <template v-for="product in shop.products" :key="product.id">

                                <ProductLink :product="product" 
                                            style="height: 75%;">

                                    <div class="form-control bg-xpress-gray-100 pt-0 px-2 pb-2
                                            border-top border-start-0
                                            border-bottom-0 border-end-0
                                            border-light rounded-0
                                            d-flex justify-content-between align-items-center">

                                        <p class="roboto text-light w-100 pt-2
                                            float-end fs-xpress-sm-200 fw-xpress-600">
                                            Quantity: {{ product.orderDetails.quantityOrdered }}
                                        </p>

                                    </div>

                                    <button class="btn bg-xpress-red-100 w-100
                                        bg-hover-xpress-to-gray-200
                                        rounded-0 text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500"
                                        @click="remove(product.orderDetails)">
                                        Remove
                                    </button>

                                </ProductLink>

                            </template>
                            
                        </template>

                        <!-- submit or visit section for visiting cart or checking out -->
                        <div class="cart-result-box gradient-black-op-100-to-bg-gray-200 
                        position-absolute bottom-0
                        w-100 text-light">

                            <div class="px-3 pt-3 pb-0 mb-0">
                                <p class="roboto fw-xpress-500">Total Ordered</p>

                                <div class="row">
                                    <div class="col-6">
                                        <p class="roboto fs-xpress-sm-200 fw-xpress-300">
                                            Quantity: {{ totalQuantity }} pieces</p>
                                        <p class="roboto fs-xpress-sm-200 fw-xpress-300">Expected Duration on Delivery:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="roboto fs-xpress-sm-200 fw-xpress-300">
                                            Total: P{{ totalPrice.toFixed(2) }}</p>
                                        <p class="roboto fs-xpress-sm-200 fw-xpress-300">24 hours</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end pe-2 pb-2 mt-0">

                                    <Link class="btn bg-xpress-purple-300
                                        bg-hover-xpress-to-gray-200
                                        rounded-0 text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500"
                                        :href="route('profile')">
                                        Visit Profile
                                    </Link>

                                    <Link class="btn bg-xpress-orange-100
                                        bg-hover-xpress-to-gray-200
                                        rounded-0 text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500"
                                        :href="route('checkout')">
                                        Go Checkout
                                    </Link>

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
    import { Link } from '@inertiajs/inertia-vue3';
    import { inject } from 'vue';
    import { useTotal } from '../../../Composables/UseTotal';
    import { Inertia } from '@inertiajs/inertia';
    //const { quantity, priceWithDiscount, updateQuantity } = useProduct(props.product);
    
    const shops = inject('shops');
    console.log(shops);
    const { totalQuantity, totalPrice } = useTotal(shops);

    function remove(orderDetails) {
        Inertia.delete(route('orders.deleteItem', {
            'orderID': orderDetails.orderID, 
            'productID': orderDetails.productID
        }));
        location.reload();
    }

    // quantity.value = props.product.orderDetails.quantityOrdered;
</script>

<style scoped>

</style>