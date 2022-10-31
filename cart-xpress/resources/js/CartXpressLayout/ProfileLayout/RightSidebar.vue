<template>
    <!-- right -->
    <div class="col-9 p-0 pb-3">

        <ProfileHeader :user="props.user" :user-profile="props.userProfile" />

        <div class="wrapper bg-xpress-gray-100">

            <!-- on-cart -->
            <Order v-if="!props.restricted" :orders="props.onCartOrders" 
                color="purple-100" buttonName="YOUR SHOPPING CART"
                class-icon="fa-solid fa-cart-shopping" 
                :readOnly="false" :index="0">
                                
                <!-- order upper parts -->
                <Link class="btn bg-xpress-orange-200 float-end
                    bg-hover-xpress-to-gray-200
                    rounded text-light py-1 px-4 roboto
                    fs-xpress-sm-200 fw-xpress-500"
                    :href="route('checkout')">
                    GO CHECKOUT
                </Link>
                
            </Order>

            <!-- pending -->
            <Order :on-service="props.restricted" :orders="props.pendingOrders" 
                color="orange-200" buttonName="PENDING ORDERS"
                class-icon="fa-solid fa-spinner" :index="props.user.isHired == 0 ? 1 : -1"
                :readOnly="true" :can-cancel="props.user.isHired == 0">

            </Order>

            <!-- delivered -->
            <Order v-if="!props.restricted" :orders="props.deliveredOrders" 
                color="green-200" buttonName="DELIVERED ORDERS"
                class-icon="fa-solid fa-check" 
                :readOnly="true" :index="2" />

            <!-- cancelled -->
            <Order v-if="!props.restricted" :orders="props.cancelledOrders" 
                color="red-100" buttonName="CANCELLED ORDERS"
                class-icon="fa-solid fa-ban" 
                :readOnly="true" :index="3" :can-order="true" />
    
        </div>

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import { inject, reactive } from 'vue';
    import ProfileHeader from './ProfileHeader.vue';
    import Order from './Order.vue';

    const props = inject('userProps');

</script>

<style lang="scss" scoped>

</style>