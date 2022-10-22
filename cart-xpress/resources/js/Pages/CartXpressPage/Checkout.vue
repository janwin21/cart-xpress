<template>

    <CartXpressAppLayout>
    
        <!-------------------------------- Checkout Main Content START -->
        <div class="container-fluid pt-4 px-3 bg-opaque-xpress-black-200">
        
            <!-------------------------------- Checkout Header START -->   
            <div class="checkbox-content container-fluid">

                <div class="row align-items-end">

                    <div class="col-6 bg-xpress-gray-200">

                        <!-- title header -->
                        <div class="title-header p-4">
                            
                            <h2 class="fs-xpress-md-400 lato 
                                    fw-xpress-600 text-light
                                    text-shadow-300 mb-0">
                                    CART <span class="text-xpress-yellow-100">X</span>PRESS</h2>
                
                            <h2 class="fs-xpress-sm-700 fw-xpress-700 
                                    text-xpress-red-100 lato mt-0">
                
                                    Shopping Cart</h2>
                
                            <p class="text-light roboto mt-4 w-75">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Dicta, aut. Maxime obcaecati voluptas.</p>
                        </div>

                    </div>

                    <div class="checkout-box col-6 
                                bg-xpress-gray-100 p-3" 
                                style="z-index: 1050;">

                        <div class="row">

                            <div class="col-7">

                                <h4 class="d-inline roboto text-light 
                                            mb-1 fs-xpress-sm-300 w-50 text-end">
                                            TOTAL QUANTITY: <span class="text-xpress-yellow-100">
                                            {{ totalQuantity }} pieces</span></h4>
                            </div>

                            <div class="col-5 text-end">

                                <h4 class="d-inline roboto text-light 
                                            mb-1 fs-xpress-sm-400 w-50 text-end">
                                            <span class="text-light">
                                            P{{ totalPrice }}</span></h4>
                            </div>

                            <div class="col-7 mt-2">

                                <h4 class="d-inline roboto text-xpress-gray-300 
                                            mb-1 fs-xpress-sm-200 w-50 text-end">
                                            You can <span class="text-xpress-red-100">
                                                cancel</span> your order everytime</h4>
                            </div>

                            <div class="col-5 text-end mt-2">
            
                                <button class="btn bg-xpress-orange-100 w-50
                                            bg-hover-xpress-to-gray-200
                                            rounded-0 text-light py-1 px-3 roboto
                                            fs-xpress-sm-300 fw-xpress-500">
                                            Check out</button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!---------- Checkout Header END -->
        
            <!-------------------------------- Shopping Cart Content START -->  
            <div class="shopping-cart-content bg-xpress-gray-200">
                
                <div class="row m-0 p-3 pt-4">

                    <div class="col-2 bg-xpress-purple-100 rounded-start py-2 ps-3">

                        <h4 class="d-inline roboto text-light fw-xpress-500
                                    mb-1 fs-xpress-sm-400 w-50 text-end">
                                    YOUR CART</h4>
                    </div>

                    <div class="col-10 bg-xpress-purple-100 ps-5 rounded-end">

                        <div class="row">

                            <div class="col-4"></div>

                            <div class="col-2 bg-xpress-purple-100 py-2">
            
                                <h4 class="d-inline roboto text-light fw-xpress-500
                                            mb-1 fs-xpress-sm-300 w-50 text-end">
                                            PRICE</h4>
                            </div>

                            <div class="col-2 bg-xpress-purple-100 py-2">
            
                                <h4 class="d-inline roboto text-light fw-xpress-500
                                            mb-1 fs-xpress-sm-300 w-50 text-end">
                                            QUANTITY</h4>
                            </div>

                            <div class="col-2 bg-xpress-purple-100 py-2">
            
                                <h4 class="d-inline roboto text-light fw-xpress-500
                                            mb-1 fs-xpress-sm-300 w-50 text-end">
                                            COST</h4>
                            </div>

                            <div class="col-2 bg-xpress-purple-100 py-2 rounded">
            
                                <h4 class="d-inline roboto text-light fw-xpress-500
                                            mb-1 fs-xpress-sm-300 w-50 text-end">
                                            ACTION</h4>
                            </div>

                        </div>

                    </div>

                    <template v-for="shop in shops" :key="shop.id">

                        <ShopSeller :shop="shop" />

                    </template>

                </div>
        
                <!-------------------------------- Address Cart Content START -->  
                <div class="address-content mt-1 pb-3 px-3">
        
                    <div class="row m-0">
                        
                        <!-- other address content -->
                        <div class="col-2 ps-0">
                                    
                            <!-- other address notes -->
                            <h6 class="roboto text-xpress-orange-200 
                                    fs-xpress-sm-300">OTHER ADDRESS</h6>

                            <p class="roboto text-light fs-xpress-sm-200 justify">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Natus deserunt quia aperiam sed id</p>
                                    
                            <!-- other address notes -->
                            <h6 class="roboto text-xpress-gray-300 mt-5
                                    fs-xpress-sm-300">SEARCH COLLEAGUES</h6>
        
                            <!-- search customer inputs -->
                            <input class="roboto text-xpress-gray-100 
                                    bg-light border-0 py-1 fw-xpress-500
                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                    name="search">

                            <div class="row row-cols-4 g-1 mt-2">

                                <div class="col">
                                    <a href="#">
                                        <img class="rounded-circle w-100" src="/images/alphabetical-profile/a-profile.jpg" style="height: 48px" alt="">
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="#">
                                        <img class="rounded-circle w-100" src="/images/alphabetical-profile/a-profile.jpg" style="height: 48px" alt="">
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="#">
                                        <img class="rounded-circle w-100" src="/images/alphabetical-profile/a-profile.jpg" style="height: 48px" alt="">
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="#">
                                        <img class="rounded-circle w-100" src="/images/alphabetical-profile/a-profile.jpg" style="height: 48px" alt="">
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="#">
                                        <img class="rounded-circle w-100" src="/images/alphabetical-profile/a-profile.jpg" style="height: 48px" alt="">
                                    </a>
                                </div>

                                <div class="col">
                                    <a href="#">
                                        <img class="rounded-circle w-100" src="/images/alphabetical-profile/a-profile.jpg" style="height: 48px" alt="">
                                    </a>
                                </div>

                            </div>

                        </div>
        
                        <!-- address content -->
                        <div class="col-10">

                            <div class="row position-relative">

                                <!-- your profile background images -->
                                <div class="w-100 h-100 p-0 position-absolute top-0 left-0 bg-primary">

                                    <img class="w-100 h-100" 
                                        src="/images/alphabetical-backgrounds/a-profile-background.jpg" 
                                        alt="" style="z-index: -1; object-fit: cover;">
                                </div>

                                <!-- setter address display -->
                                <div class="col-2 gradient-transparent-to-bg-gray-200 text-center py-5" style="z-index: 1000;">

                                    <img class="w-50 rounded-circle" 
                                        src="/images/alphabetical-profile/a-profile.jpg" alt="">
            
                                    <button class="btn bg-xpress-purple-100 mt-4
                                                bg-hover-xpress-to-gray-200
                                                rounded text-light p-1 roboto
                                                fs-xpress-sm-200 fw-xpress-500">
                                                Set As Your Default Address</button>
                                </div>

                                <!-- address form -->
                                <div class="col-10 gradient-transparent-to-bg-gray-200 py-5" style="z-index: 1000;">

                                    <div class="row">
                                    
                                        <!-- your location warning notes -->
                                        <div class="col-4">
                                            <h6 class="roboto text-xpress-red-200 fs-xpress-sm-300">YOUR LOCATION</h6>
                                            <p class="roboto text-light fs-xpress-sm-200 justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus deserunt quia aperiam sed id</p>
                                        </div>
        
                                        <!-- address lines -->
                                        <div class="col-8">
        
                                            <!-- addressLine1 -->
                                            <div class="form-control p-0 rounded-0 border-0">
                                                
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="addressLine1">ADDRESS LINE 1</label>
        
                                                <input class="roboto text-xpress-gray-100
                                                    bg-light border-0 py-1 fw-xpress-500 
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                    name="addressLine1">
                                            </div>
        
                                            <!-- addressLine2 -->
                                            <div class="form-control p-0 rounded-0 border-0 mt-3">
                                                
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="addressLine2">ADDRESS LINE 2</label>
        
                                                <input class="roboto text-xpress-gray-100 
                                                    bg-light border-0 py-1 fw-xpress-500 
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                    name="addressLine2">
                                            </div>
        
                                        </div>
        
                                        <!-- city -->
                                        <div class="col-3 mt-4">
                                            <div class="form-control p-0 rounded-0 border-0">
        
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="city">CITY</label>
        
                                                <input class="roboto text-xpress-gray-100 
                                                    bg-light border-0 py-1 fw-xpress-500
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                    name="city">
                                            </div>
                                        </div>
        
                                        <!-- state -->
                                        <div class="col-3 mt-4">
                                            <div class="form-control p-0 rounded-0 border-0">
        
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="state">STATE</label>
        
                                                <input class="roboto text-xpress-gray-100 
                                                    bg-light border-0 py-1 fw-xpress-500
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                    name="state">
                                            </div>
                                        </div>
        
                                        <!-- postalCode -->
                                        <div class="col-3 mt-4">
                                            <div class="form-control p-0 rounded-0 border-0">
        
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="postalCode">POSTAL CODE</label>
        
                                                <input class="roboto text-xpress-gray-100 
                                                    bg-light border-0 py-1 fw-xpress-500
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                    name="postalCode">
                                            </div>
                                        </div>
        
                                        <!-- country -->
                                        <div class="col-3 mt-4">
                                            <div class="form-control p-0 rounded-0 border-0">
        
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="country">COUNTRY</label>
        
                                                <input class="roboto text-xpress-gray-100 
                                                    bg-light border-0 py-1 fw-xpress-500
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                    name="country">
                                            </div>
                                        </div>
                                    
                                        <!-- delivery policy notes -->
                                        <div class="col-4 mt-4">
                                            <h6 class="roboto text-xpress-blue-100 fs-xpress-sm-300">DELIVERY POLICY</h6>
                                            <p class="roboto text-light fs-xpress-sm-200 justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus deserunt quia aperiam sed id</p>
                                        </div>

                                        <div class="col-8 mt-4">

                                            <!-- comment -->
                                            <div class="form-control p-0 rounded-0 border-0">
        
                                                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                    for="country">COMMENT</label>
                    
                                                <textarea class="roboto text-xpress-gray-100 
                                                        bg-light border-0 py-2 fw-xpress-500 
                                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2"
                                                                name="comment"
                                                                style="height: 100px;"></textarea>
                                            </div>

                                        </div>

                                        <div class="col-4 mt-4">
        
                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="country">EXPECTED DURATION ON DELIVERY</label>
                                        </div>

                                        <div class="col-5 mt-4">
        
                                            <label class="roboto text-light fs-xpress-sm-300 fw-xpress-500" 
                                                for="country">24 HOURS</label>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
        
                    </div>
        
                </div>
                <!---------- Address Cart Content END -->

            </div>
            <!---------- Shopping Cart Content END -->

        </div>
        <!---------- Checkout Main Content END -->

    </CartXpressAppLayout>

</template>

<script setup>
    import { ref, computed, reactive, watch } from 'vue';
    import _ from 'lodash';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import ShopSeller from '../../CartXpressLayout/CheckoutLayout/ShopSeller.vue';

    // actions & composables
    import callCheckout from '../../Actions/checkout';

    callCheckout();

    const shops = reactive([
        {
            id: 0,
            name: 'shopName XYZ',

            products: [
                {
                    id: 0,
                    name: 'Product 01',
                    createdAt: new Date(),
                    price: 150,
                    size: 3,
                    discount: 0.25,
                    durationOfDeliveryByHour: 4,
                    quantityInStock: 80,
                    imagePath: '/images/sample-products/product-1.jpg',
                    overallRating: 4.3,
                    countReviews: 67,
                    totalPriceSold: 14000,

                    category: { 
                        id: 0,
                        name: 'category name'
                    },

                    orderDetails: {
                        quantityOrdered: 7
                    }
                },
                {
                    id: 1,
                    name: 'Product 01',
                    createdAt: new Date(),
                    price: 150,
                    size: 3,
                    discount: 0.25,
                    durationOfDeliveryByHour: 4,
                    quantityInStock: 80,
                    imagePath: '/images/sample-products/product-2.jpg',
                    overallRating: 4.3,
                    countReviews: 67,
                    totalPriceSold: 14000,

                    category: { 
                        id: 0,
                        name: 'category name'
                    },

                    orderDetails: {
                        quantityOrdered: 7
                    }
                },
                {
                    id: 2,
                    name: 'Product 01',
                    createdAt: new Date(),
                    price: 150,
                    size: 3,
                    discount: 0.25,
                    durationOfDeliveryByHour: 4,
                    quantityInStock: 80,
                    imagePath: '/images/sample-products/product-2.jpg',
                    overallRating: 4.3,
                    countReviews: 67,
                    totalPriceSold: 14000,

                    category: { 
                        id: 0,
                        name: 'category name'
                    },

                    orderDetails: {
                        quantityOrdered: 7
                    }
                }
            ]
        },
        {
            id: 0,
            name: 'shopName ABC',

            products: [
                {
                    id: 0,
                    name: 'Product 0221',
                    createdAt: new Date(),
                    price: 150,
                    size: 3,
                    discount: 0.25,
                    durationOfDeliveryByHour: 4,
                    quantityInStock: 80,
                    imagePath: '/images/sample-products/product-6.jpg',
                    overallRating: 4.3,
                    countReviews: 67,
                    totalPriceSold: 14000,

                    category: { 
                        id: 0,
                        name: 'category name'
                    },

                    orderDetails: {
                        quantityOrdered: 7
                    }
                },
                {
                    id: 1,
                    name: 'Product1212ewqwewe',
                    createdAt: new Date(),
                    price: 150,
                    size: 3,
                    discount: 0.25,
                    durationOfDeliveryByHour: 4,
                    quantityInStock: 80,
                    imagePath: '/images/sample-products/product-4.jpg',
                    overallRating: 4.3,
                    countReviews: 67,
                    totalPriceSold: 14000,

                    category: { 
                        id: 0,
                        name: 'category name'
                    },

                    orderDetails: {
                        quantityOrdered: 7
                    }
                },
                {
                    id: 2,
                    name: 'Product thisdin',
                    createdAt: new Date(),
                    price: 150,
                    size: 3,
                    discount: 0.25,
                    durationOfDeliveryByHour: 4,
                    quantityInStock: 80,
                    imagePath: '/images/sample-products/product-5.jpg',
                    overallRating: 4.3,
                    countReviews: 67,
                    totalPriceSold: 14000,

                    category: { 
                        id: 0,
                        name: 'category name'
                    },

                    orderDetails: {
                        quantityOrdered: 7
                    }
                }
            ]
        }
    ]);

    const totalQuantity = ref(0)
    const totalPrice = ref(0);

    watch(shops, function(newShops) {
        
        totalQuantity.value = _.sumBy(shops, shop => {

            return _.sumBy(shop.products, product => {

                return product.orderDetails.quantityOrdered;

            });

        });

        totalPrice.value = _.sumBy(shops, shop => {

            return _.sumBy(shop.products, product => {

                const discountPrice = product.price * product.discount;
                const singleTOtalPrice = product.price - discountPrice;
                   
                return singleTOtalPrice * product.orderDetails.quantityOrdered;

            });

        });

    }, {
        deep: true,
        immediate: true
    });

</script>

<style lang="scss" scoped>

</style>