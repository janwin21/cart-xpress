<template>

    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Profile Main START -->
            <div class="register">

                <div class="row">

                    <!-- right -->
                    <div class="col-9 p-0 pb-3">

                        <ProfileHeader :user="props.user" :user-profile="props.userProfile" />

                        <div v-if="!props.restricted" class="wrapper bg-xpress-gray-100">

                            <!-- on-cart -->
                            <Order :orders="props.onCartOrders" 
                                   color="purple-100" buttonName="YOUR SHOPPING CART"
                                   class-icon="fa-solid fa-cart-shopping" 
                                   :readOnly="false" :index="0">
                                   
                                <!-- order upper parts -->
                                <button class="btn bg-xpress-orange-200 float-end
                                        bg-hover-xpress-to-gray-200
                                        rounded text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500">
                                        BUT IT NOW</button>
                                
                            </Order>

                            <!-- pending -->
                            <Order :orders="props.pendingOrders" 
                                   color="orange-200" buttonName="PENDING ORDERS"
                                   class-icon="fa-solid fa-spinner" 
                                   :readOnly="true" :index="1" />

                            <!-- delivered -->
                            <Order :orders="props.deliveredOrders" 
                                   color="green-200" buttonName="DELIVERED ORDERS"
                                   class-icon="fa-solid fa-check" 
                                   :readOnly="true" :index="2" />

                            <!-- cancelled -->
                            <Order :orders="props.cancelledOrders" 
                                   color="red-100" buttonName="CANCELLED ORDERS"
                                   class-icon="fa-solid fa-ban" 
                                   :readOnly="true" :index="3">
                        
                                <button class="btn bg-xpress-purple-100 float-end
                                        bg-hover-xpress-to-gray-200
                                        rounded text-light py-1 px-4 roboto
                                        fs-xpress-sm-200 fw-xpress-500">
                                        ADD TO CART</button>

                            </Order>
                    
                        </div>

                    </div>

                    <CustomerSidebar />

                </div>

            </div>
            <!---------- Cart Xpress Profile Main END -->

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    import { provide, reactive } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/RegisterLayout/RegisterCover.vue';
    import ProfileHeader from '../../CartXpressLayout/ProfileLayout/ProfileHeader.vue';
    import Order from '../../CartXpressLayout/ProfileLayout/Order.vue';
    import CustomerSidebar from '../../CartXpressLayout/ProfileLayout/CustomerSidebar.vue';

    // actions & composables
    import callRegister from '../../Actions/register';
    import callProfile from '../../Actions/profile';

    callRegister();
    callProfile();

    const props = defineProps({
        user: Object,
        userProfile: Object,
        onCartOrders: Array,
        pendingOrders: Array,
        deliveredOrders: Array,
        cancelledOrders: Array,
        restricted: Boolean,
        hasLogin: Boolean
    });

    provide('hasLogin', reactive(props.hasLogin))

</script>

<style lang="scss" scoped>

</style>