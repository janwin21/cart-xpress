<template>
    <!-- cart containers -->
    <div class="shopping-cart-row pt-4">
    
        <button :class="`dropdown-btn btn bg-xpress-${props.color} w-25
            bg-hover-xpress-to-gray-200 text-end
            rounded-0 text-light py-1 ps-4 roboto
            fs-xpress-sm-300 fw-xpress-500`"
            :data-index="props.index">
            {{ props.buttonName }}</button>

        <!--<EmptyItem :length="props.orders.length" :index="index" />-->

        <div class="order-wrapper" :style="`${onService ? '' : 'display: none'};`">

            <template v-for="order in props.orders" :key="order.id">

                <!-- cart header -->
                <div :class="`bg-xpress-gray-200 border-bottom-${props.color} 
                            rounded-top mx-3 mt-3 px-3 py-2`">

                    <h4 class="d-inline roboto text-light fw-xpress-500
                            mb-1 fs-xpress-sm-400 w-50 text-end">
                            <i :class="`${props.classIcon} me-2 
                                        text-xpress-${props.color}`"></i>
                            {{ moment(order.orderedDate).format('MMMM Do YYYY, h:mm:ss a') }}</h4>

                    <slot />
                                        
                    <!-- order upper parts -->
                    <button v-if="canCancel" class="btn bg-xpress-red-100 float-end
                        bg-hover-xpress-to-gray-200
                        rounded text-light py-1 px-4 roboto
                        fs-xpress-sm-200 fw-xpress-500"
                        @click="cancel(order.id)">
                        CANCEL
                    </button>
                                        
                    <!-- order upper parts -->
                    <button v-if="canOrder" class="btn bg-xpress-orange-200 float-end
                        bg-hover-xpress-to-gray-200
                        rounded text-light py-1 px-4 roboto
                        fs-xpress-sm-200 fw-xpress-500"
                        @click="reOrder(order.id)">
                        RE-ORDER
                    </button>

                    <template v-if="onService">
                                            
                        <!-- order upper parts -->
                        <Link v-if="onService" 
                            class="btn bg-xpress-orange-200 float-end
                            bg-hover-xpress-to-gray-200
                            rounded text-light py-1 px-4 roboto
                            fs-xpress-sm-200 fw-xpress-500 ms-1"
                            :href="route('orders.showCheckout', order.id)">
                            MORE INFO
                        </Link>
                    
                    </template>

                </div>

                <!-- cart content -->
                <div class="bg-xpress-gray-200 mx-3 pb-1">
                    
                    <div class="row row-cols-6 m-0 g-1">

                        <template v-for="product in order.products" :key="product.id">

                            <ProductLink :product="product"
                                style="height: 75%;">

                                <button v-if="!readOnly" class="btn bg-xpress-red-100 w-100
                                    bg-hover-xpress-to-gray-200
                                    rounded-0 text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500"
                                    @click="remove(order.id, product.id)">
                                    Remove
                                </button>

                            </ProductLink>

                        </template>

                    </div>

                </div>

            </template>
            
        </div>

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import ProductLink from '../HomeLayout/Elements/ProductLink.vue';
    import EmptyItem from './Elements/EmptyItem.vue';
    import { reactive } from 'vue';
    import moment from 'moment';
    import { Inertia } from '@inertiajs/inertia';

    const props = defineProps({
        orders: Array,
        color: String,
        buttonName: String,
        classIcon: String,
        readOnly: Boolean,
        onService: Boolean,
        canCancel: Boolean,
        canOrder: Boolean,
        index: Number
    });

    function cancel(id) {
        
        Inertia.patch(route('orders.cancel', id));

    }

    function reOrder(id) {
        
        Inertia.patch(route('orders.reOrder', id));

    }

    function remove(orderID, productID) {
        Inertia.delete(route('orders.deleteItem', {
            'orderID': orderID, 
            'productID': productID
        }));
    }
    
</script>

<style lang="scss" scoped>

</style>