<template>
    <!-- cart containers -->
    <div class="shopping-cart-row pt-4">
    
        <button :class="`dropdown-btn btn bg-xpress-${props.color} w-25
                         bg-hover-xpress-to-gray-200 text-end
                         rounded-0 text-light py-1 ps-4 roboto
                         fs-xpress-sm-300 fw-xpress-500`"
                         :data-index="props.index">
                         {{ props.buttonName }}</button>

        <EmptyItem :length="orders.length" />

        <div class="order-wrapper" style="display: none;">

            <template v-for="order in orders" :key="order.id">

                <!-- cart header -->
                <div :class="`bg-xpress-gray-200 border-bottom-${props.color} 
                            rounded-top mx-3 mt-3 px-3 py-2`">

                    <h4 class="d-inline roboto text-light fw-xpress-500
                            mb-1 fs-xpress-sm-400 w-50 text-end">
                            <i :class="`${props.classIcon} me-2 
                                        text-xpress-${props.color}`"></i>
                            {{ moment(order.orderedDate).format('MMMM Do YYYY, h:mm:ss a') }}</h4>

                    <slot />

                </div>

                <!-- cart content -->
                <div class="bg-xpress-gray-200 mx-3">
                    
                    <div class="row row-cols-6 m-0 g-1">

                        <template v-for="product in order.products" :key="product.id">

                            <ProductLink :product="product" style="height: 75%;">

                                <div :class="`form-control bg-xpress-${!readOnly ? gray-100 : props.color} 
                                     pt-0 px-2 pb-2
                                     border-top
                                     border-start-0
                                     border-bottom-0
                                     border-end-0
                                     border-light rounded-0
                                     d-flex justify-content-between align-items-center`">

                                    <label :class="`text-${!readOnly ? 'light' : 'xpress-gray-200'} 
                                            roboto fs-xpress-sm-200`" 
                                            for="quantityOrdered">Quantity</label>

                                    <template v-if="!readOnly">

                                        <input class="w-50 mt-2 px-2" 
                                            type="number" 
                                            name="quantityOrdered"
                                            :value="product.orderDetails.quantityOrdered"
                                            min="1" />

                                    </template>
                                    <template v-else>

                                        <p class="card-text text-xpress-gray-200 
                                                fw-xpress-900 fs-xpress-sm-400">
                                                5</p>

                                    </template>

                                </div>

                                    <button v-if="!readOnly" class="btn bg-xpress-red-100 w-100
                                            bg-hover-xpress-to-gray-200
                                            rounded-0 text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500">
                                            Remove</button>

                            </ProductLink>

                        </template>

                    </div>

                </div>

            </template>
            
        </div>

    </div>
</template>

<script setup>
    import ProductLink from '../../HomeLayout/Elements/ProductLink.vue';
    import EmptyItem from './Elements/EmptyItem.vue';
    import { reactive } from 'vue';
    import moment from 'moment';

    const props = defineProps({
        color: String,
        buttonName: String,
        classIcon: String,
        readOnly: Boolean,
        index: Number
    });

    const orders = reactive([
        {
            id: 0,
            orderedDate: new Date("2020-02-12"),
            products:  [
                {
                    id: 0,
                    name: 'the first product',
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
                }
            ]
        },
        {
            id: 0,
            orderedDate: new Date("2022-010-11"),
            products:  [
                {
                    id: 0,
                    name: 'the first product',
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
            ]
        }
    ]);

</script>

<style lang="scss" scoped>

</style>