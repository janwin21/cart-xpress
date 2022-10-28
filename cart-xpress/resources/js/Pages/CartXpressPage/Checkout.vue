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
                                    P{{ (Math.round(totalPrice * 100) / 100).toFixed(2) }}</span>
                                </h4>

                            </div>

                            <div class="col-7 mt-2">

                                <h4 class="d-inline roboto text-xpress-gray-300 
                                    mb-1 fs-xpress-sm-200 w-50 text-end">
                                    You can <span class="text-xpress-red-100">
                                    cancel</span> your order everytime
                                </h4>

                            </div>

                            <div class="col-5 text-end mt-2">
            
                                <button v-if="!isHired" class="btn bg-xpress-orange-100 w-50
                                    bg-hover-xpress-to-gray-200
                                    rounded-0 text-light py-1 px-3 roboto
                                    fs-xpress-sm-300 fw-xpress-500"
                                    @click="submitOrder()">
                                    Check out
                                </button>
            
                                <button v-if="isHired" class="btn bg-success w-50
                                    bg-hover-xpress-to-gray-200
                                    rounded-0 text-light py-1 px-3 roboto
                                    fs-xpress-sm-300 fw-xpress-500"
                                    @click="deliverOrder(props.orderID)" type="button">
                                    Deliver
                                </button>

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

                    <template v-for="shop in props.shops" :key="shop.id">

                        <ShopSeller :shop="shop" />

                    </template>

                </div>
        
                <!-------------------------------- Address Cart Content START -->  
                <div class="address-content mt-1 pb-3 px-3">
        
                    <form @submit.prevent="shopInput.post(route('order'))">
                        
                        <div class="row m-0">
            
                            <UserAddress v-if="!isHired" :users="props.users" />

                            <LocationForm v-if="!isHired" />

                            <input ref="checkBtn" class="d-none" 
                                type="submit" value="submit" />

                        </div>

                    </form>
        
                </div>
                <!---------- Address Cart Content END -->

            </div>
            <!---------- Shopping Cart Content END -->

        </div>
        <!---------- Checkout Main Content END -->

    </CartXpressAppLayout>

</template>

<script setup>
    import { ref, provide, reactive } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3';
    import $ from 'jquery';
    import _ from 'lodash';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import ShopSeller from '../../CartXpressLayout/CheckoutLayout/ShopSeller.vue';
    import UserAddress from '../../CartXpressLayout/CheckoutLayout/UserAddress.vue';
    import LocationForm from '../../CartXpressLayout/CheckoutLayout/LocationForm.vue';

    // actions & composables
    import callCheckout from '../../Actions/checkout';
    import { useTotal } from '../../Composables/UseTotal';
    import { Inertia } from '@inertiajs/inertia';

    callCheckout();

    const props = defineProps({
        orderID: Number,
        shops: Array,
        users: Array,
        user: Object,
        hasLogin: Boolean,
        isHired: Boolean
    });

    const checkBtn = ref(null);
    const { totalQuantity, totalPrice } = useTotal(props.shops);

    const shopInput = useForm({
        addressLine1: '',
        addressLine2: '',
        city: '',
        state: '',
        postalCode: '',
        country: '',
        comment: '',
        quantities: [],
        shops: props.shops
    });

    provide('hasLogin', reactive(props.hasLogin));
    provide('isHired', reactive(props.isHired));
    provide('shopInput', shopInput);
    provide('yourProfile', props.user);

    provide('setDefaultAddress', event => {

        event.preventDefault();

        const user = props.users[event.currentTarget.dataset.id];

        shopInput.addressLine1 = user.addressLine1;
        shopInput.addressLine2 = user.addressLine2;
        shopInput.city = user.city;
        shopInput.state = user.state;
        shopInput.postalCode = user.postalCode;
        shopInput.country = user.country;
        shopInput.comment = user.orders.comment;

    });

    provide('setProfileAddress', () => {
        
        shopInput.addressLine1 = props.user.addressLine1;
        shopInput.addressLine2 = props.user.addressLine2;
        shopInput.city = props.user.city;
        shopInput.state = props.user.state;
        shopInput.postalCode = props.user.postalCode;
        shopInput.country = props.user.country;
        shopInput.comment = props.user.orders.comment;

    });

    function submitOrder() {

        $(checkBtn.value).click();

    }

    function deliverOrder(orderID) {

        Inertia.patch(route('orders.deliverOrder', orderID));

    }

</script>

<style lang="scss" scoped>

</style>