<template>
    <!-- product details -->
    <div class="product-wrapper rounded-top border-bottom-gray-300
                bg-xpress-gray-200 container-fluid">

        <div class="row">

            <!-- product images -->
            <div class="col-3 pt-4 ps-4 pe-0">

                <img class="w-100 rounded" 
                    :src="props.product.imagePath" alt="product image" 
                    style="height: 500px;">

            </div>

            <!-- product details -->
            <div class="col-9 p-5">

                <!-- product header -->
                <div class="product-header">

                    <h4 class="d-inline roboto text-light 
                        mb-1 fs-xpress-sm-700">
                        {{ props.product.name }}</h4>

                    <p class="d-inline roboto mt-0 
                        fs-xpress-sm-200 fw-xpress-500 
                        bg-xpress-purple-300 rounded 
                        px-3 py-1 text-light ms-3">
                        {{ props.product.category.name }}</p>
                </div>

                <!-- upper details -->
                <div class="row p-0">
                    <div class="col-3">

                        <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-400 
                            text-xpress-yellow-200">
                            RATING {{ props.product.overallRating }}</p>
                    </div>
                    <div class="col-3">

                        <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            {{ props.product.countReviews }} REVIEWS</p>
                    </div>
                    <div class="col-3">

                        <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            P{{ nFormatter(props.product.totalPriceSold, 2) }} TOTAL SOLD</p>
                    </div>
                    <div class="col-3">

                        <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            POSTED AT {{ moment(props.product.createdAt).format("MMM Do YYYY") }}</p>
                    </div>
                </div>


                <!-- main details -->
                <div class="main-details row d-flex align-items-end mt-4">
                    <div class="col-3 p-0 ps-2">

                        <h4 class="d-inline roboto mt-0 
                            fs-xpress-sm-700 fw-xpress-700 
                            text-light p-0 m-0">
                            P</h4>

                        <h1 class="d-inline roboto mt-0 
                            fs-xpress-md-900 fw-xpress-500 
                            text-light p-0 m-0">
                            {{ nFormatter(props.product.price, 1) }}</h1>
                    </div>

                    <div class="col-3 pb-2">
                        <p class="d-inline roboto mt-0
                            fs-xpress-sm-500 fw-xpress-500 
                            text-light">
                            Weight 
                            <span class="text-xpress-gray-600">{{ props.product.size }} kg</span></p>
                    </div>

                    <div class="col-3 pb-2">
                        <p class="d-inline roboto mt-0
                            fs-xpress-sm-500 fw-xpress-500 
                            text-light">
                            Discount 
                            <span class="text-xpress-yellow-200">
                                {{ nFormatter((props.product.discount * 100), 2) }}%</span></p>
                    </div>

                    <div class="col-3 pb-2 text-end pe-5">

                        <button class="btn bg-xpress-orange-100
                            bg-hover-xpress-to-gray-200 text-light
                            rounded fs-xpress-sm-100 
                            fw-xpress-600 ms-1"
                            id="background-btn"
                            @click="showOneWayOptionPopup()">
                            <i class="fa-solid fa-pen"></i>
                        </button>

                        <button class="btn bg-xpress-red-100
                            bg-hover-xpress-to-gray-200 text-light
                            rounded fs-xpress-sm-100 
                            fw-xpress-600 ms-1"
                            id="background-btn"
                            @click="showTwoWayOptionPopup()">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <Link class="btn bg-success
                            bg-hover-xpress-to-gray-200 text-light
                            rounded fs-xpress-sm-100 
                            fw-xpress-600 ms-1"
                            :href="route('shops.show', props.product.shop.id)"
                            id="background-btn">
                            <i class="fa-solid fa-eye"></i>
                        </Link>
                        
                    </div>

                    <div class="col-12 pb-2 pe-5">

                        <p class="roboto mt-0
                            fs-xpress-sm-300 fw-xpress-500 
                            text-xpress-gray-600">
                            ACTUAL PRICE <span class="text-xpress-yellow-200 ms-3">P
                                {{ (Math.round(priceWithDiscount() * 100) / 100).toFixed(2) }}
                            </span></p>
                    </div>
                </div>

                <!-- description detail -->
                <div class="product-description-detail mt-5 me-5">

                    <p class="roboto mt-0
                        fs-xpress-sm-300 fw-xpress-500 
                        text-xpress-gray-600">
                        PRODUCT DESCRIPTION</p>

                    <p class="roboto mt-0
                        fs-xpress-sm-300 fw-xpress-400 
                        text-light">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Enim voluptatibus nostrum blanditiis libero deserunt in quos, 
                        rerum mollitia neque odio voluptas! Molestiae tempore expedita 
                        delectus impedit. Id doloremque quae expedita?</p>
                </div>

                <form action="javascript: void(0)">

                    <!-- other details -->
                    <div class="other-details mt-5 row row-cols-2">

                        <div class="col">

                            <p class="roboto mt-0
                                fs-xpress-sm-300 fw-xpress-500 
                                text-xpress-gray-600">
                                DURATION OF SERVICE ON DELIVERY</p>
                        </div>

                        <div class="col">

                            <p class="roboto mt-0
                                fs-xpress-sm-400 fw-xpress-400 
                                text-light">{{ props.product.durationOfDeliveryByHour }} hours</p>
                        </div>

                        <div class="col">

                            <p class="roboto mt-0
                                fs-xpress-sm-300 fw-xpress-500 
                                text-xpress-gray-600">
                                AVAILABLE STOCK</p>
                        </div>

                        <div class="col">

                            <p class="roboto mt-0
                                fs-xpress-sm-400 fw-xpress-400 
                                text-light">{{ props.product.quantityInStock }} Remaining</p>
                        </div>

                        <div class="col mt-5">

                            <p class="d-inline roboto mt-0
                                fs-xpress-sm-300 fw-xpress-500 
                                text-light me-3">
                                QUANTITY</p>

                            <!-- quantityOrdered-->
                            <input class="roboto text-xpress-gray-100
                                bg-light border-0 px-2 fw-xpress-500 
                                fs-xpress-sm-300 rounded-0 w-25" 
                                type="number" min="0"
                                name="quantityOrdered"
                                v-model="quantity">
                        </div>

                        <div class="col mt-5">

                            <p class="roboto mt-0
                                fs-xpress-sm-300 fw-xpress-500 
                                text-xpress-gray-600">
                                TOTAL PRICE <span class="text-light ms-3">
                                    P{{ (Math.round(updateQuantity * 100) / 100).toFixed(2) }}</span></p>
                        </div>

                    </div>

                    <!-- buttons for submission -->
                    <div class="submit-buttons">

                        <form class="d-inline" @submit.prevent="orderForm.post(route('orders.addToCart'))">
                            <button class="btn bg-xpress-purple-300 
                                bg-hover-xpress-to-gray-200 text-light w-25 
                                rounded py-1 fs-xpress-sm-300 
                                fw-xpress-500 mt-5 me-1"
                                type="submit" :disabled="disabled">
                                Add To Cart
                            </button>
                        </form>

                        <form class="d-inline" @submit.prevent="orderForm.post(route('orders.addToCart'))">
                            <button class="btn bg-xpress-orange-100 
                                bg-hover-xpress-to-gray-200 text-light w-25 
                                rounded py-1 fs-xpress-sm-300 
                                fw-xpress-500 mt-5"
                                :disabled="disabled">
                                Buy it Right Now!
                            </button>
                        </form>

                    </div>

                </form>
                
            </div>

        </div>

        <teleport to="#popup">
            <div ref="twoWayOption" style="display: none;">

                <TwoOptionModal>

                    <template #modal-header>Deleting {{ props.product.name }}</template>

                    <template #modal-body>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Nulla dignissimos similique aperiam doloribus, 
                        enim suscipit soluta officia.
                    </template>

                    <template #modal-buttons>
    
                        <button class="btn bg-xpress-red-100 w-25 
                            bg-hover-xpress-to-gray-200 text-light
                            rounded py-1 fs-xpress-sm-300 
                            fw-xpress-600 mt-1"
                            id="background-btn">
                            DELETE</button>

                        <button class="btn bg-xpress-gray-500 w-25 
                            bg-hover-xpress-to-gray-200 text-light
                            rounded py-1 fs-xpress-sm-300 
                            fw-xpress-600 mt-1 ms-2"
                            id="background-btn"
                            @click="showTwoWayOptionPopup()">
                            CANCEL</button>

                    </template>
                    
                </TwoOptionModal>

            </div>
        </teleport>

        <teleport to="#backup-popup-1">
            <div ref="oneWayOption" style="display: none;">

                <OneOptionModal color="orange-100">

                    <template #modal-header>Updating {{ props.product.name }}</template>

                    <template #modal-body>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Nulla dignissimos similique aperiam doloribus, 
                        enim suscipit soluta officia.
                    </template>

                    <template #modal-button>
    
                        <button class="btn bg-xpress-orange-100 w-25 
                            bg-hover-xpress-to-gray-200 text-light
                            rounded py-1 fs-xpress-sm-300 
                            fw-xpress-600 mt-1"
                            id="background-btn">
                            PROCEED
                        </button>

                    </template>
                    
                </OneOptionModal>

            </div>
        </teleport>
    </div>
</template>

<script setup>
    import moment from 'moment';
    import { Link, useForm } from '@inertiajs/inertia-vue3';
    import { useProduct } from '../../Composables/UseProduct';
    import { usePopup } from '../../Composables/UsePopup';
    import { ref, provide, watch, inject } from 'vue';
    import TwoOptionModal from '../../CartXpressModal/TwoOptionModal.vue';
    import OneOptionModal from '../../CartXpressModal/OneOptionModal.vue';
    import { useNFormatter } from '../../Composables/UseNFormatter';

    const props = defineProps({
        product: Object
    });

    const orderForm = useForm({
        productID: 0,
        orderDetailsQuantityOrdered: 0,
        productOrderedExist: false
    });

    orderForm.productID = props.product.id;

    const { oneWayOption, twoWayOption, showOneWayOptionPopup, showTwoWayOptionPopup } = usePopup();
    const { quantity, priceWithDiscount, updateQuantity } = useProduct(props.product);
    const { nFormatter } = useNFormatter();
    const disabled = ref(true);

    quantity.value = inject('productQuantity');
    orderForm.productOrderedExist = inject('productOrderedExist');

    watch(quantity, newQuantity => {
        orderForm.orderDetailsQuantityOrdered = newQuantity;
        disabled.value = newQuantity <= 0;
    }, {
        immediate: true
    });
    
    provide('showOneWayOptionPopup', showOneWayOptionPopup);
    provide('showTwoWayOptionPopup', showTwoWayOptionPopup);

</script>

<style lang="scss" scoped>

</style>