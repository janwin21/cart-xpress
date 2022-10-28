<template>

    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Login Main START -->
            <div class="register">

                <div class="row">

                    <div class="col-9 bg-xpress-gray-100 p-0 pb-5">

                        <!-- customer component -->
                        <div class="customer-component">

                            <!-- welcome header -->
                            <div class="welcome-header 
                                border border-top-0 border-start-0 
                                border-end-0 border-bottom-1 
                                text-center px-5 pt-5 pb-4">
                                        
                                <h4 class="roboto text-xpress-blue-300">Create Your New Shop, vendorName</h4>

                                <p class="roboto text-light mt-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Esse minima, quaerat rem eum modi excepturi adipisci perspiciatis itaque 
                                    eaque ipsum, illum soluta at nesciunt.</p>
                            </div>

                            <form @submit.prevent="submitProduct" 
                                enctype="multipart/form-data">

                                <!-- first row -->
                                <div class="row gx-2 gy-4 px-5 pt-4 pb-0 mt-2">

                                    <!-- name -->
                                    <div class="col-4">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="name">PRODUCT NAME 
                                                <span class="text-xpress-red-200 roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                                type="text" name="name" required
                                                v-model="productForm.name">
                                        </div>
                                    </div>

                                    <!-- size -->
                                    <div class="col-4">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="size">How big is your product? (G) 
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                                type="number" step="0.01" name="size" required
                                                v-model="productForm.size">
                                        </div>
                                    </div>

                                    <!-- quantityInStock -->
                                    <div class="col-4">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="quantityInStock">Available Stocks 
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2"  
                                                type="number" name="quantityInStock" required
                                                v-model="productForm.quantityInStock">
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-12">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="description">DESCRIBE YOUR PRODUCT 
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <textarea class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-2 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-3"
                                                name="description" 
                                                placeholder="type the message here..."
                                                style="height: 150px;" required 
                                                v-model="productForm.description" />
                                        </div>
                                    </div>
                                    
                                    <!-- your location warning notes -->
                                    <div class="col-4">

                                        <h6 class="roboto text-xpress-pink-100 
                                            fs-xpress-sm-300">
                                            PRODUCT CATEGORIES</h6>

                                        <p class="roboto text-light fs-xpress-sm-200">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                            Natus deserunt quia aperiam sed id</p>
                                    </div>

                                    <!-- search category -->
                                    <div class="col-8">

                                        <div class="form-control p-0 rounded-0 border-0">
                                            
                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="productType">SEARCH CATEGORIES</label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                                type="search"
                                                v-model="searchProductValue" />
                                        </div>


                                    </div>

                                    <!-- imagePath -->
                                    <div class="col-4" style="height: fit-content;">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="imagePath">PRODUCT IMAGE
                                                <span class="text-xpress-red-200 
                                                roboto fw-xpress-900">*</span></label>
        
                                            <button class="btn bg-xpress-pink-100 
                                                bg-hover-xpress-to-gray-200 text-light w-100
                                                rounded py-1 fs-xpress-sm-300 
                                                fw-xpress-600 mt-1"
                                                id="background-btn"
                                                data-is-profile="false"
                                                type="button" :disabled="props.editable">
                                                UPLOAD</button>

                                            <input class="d-none" id="backgroundImagePath" 
                                                type="file" name="imagePath" :required="!props.editable"    
                                                @change="productForm.imagePath = onFile($event)" />

                                        </div>

                                        <img id="backgroundImageDisplay" 
                                            class="w-100 h-100 rounded mt-3" 
                                            :src="props.editable ? productForm.imagePath : '/images/sample-products/product-1.jpg'" 
                                            alt="" style="
                                            height: 500px;
                                            object-fit: cover;">
                                    </div>

                                    <!-- sorted components -->
                                    <div class="col-8">
                    
                                        <div class="sorted-buttons">

                                            <!-- categoryName -->
                                            <div class="form-control p-0 rounded-0 border-0">
        
                                                <label class="roboto text-xpress-gray-300 
                                                    fs-xpress-sm-300 fw-xpress-500" 
                                                    for="categoryName">CATEGORY 
                                                    <span class="text-xpress-red-200 
                                                    roboto fw-xpress-900">*</span></label>
        
                                                <input class="roboto text-xpress-gray-300 
                                                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                    fs-xpress-sm-300 rounded w-100 mt-1 px-2"
                                                    type="text" readonly name="categoryName" required
                                                    placeholder="select from below..."
                                                    v-model="productForm.categoryName" />
                                            </div>

                                            <div class="row row-cols-4 m-0 g-1">

                                                <template v-for="category in 
                                                    filterItems(searchProductValue, props.categories)" 
                                                    :key="category.id">

                                                    <div class="col">
                                
                                                        <button class="btn bg-xpress-purple-100 w-100
                                                            bg-hover-xpress-to-gray-200
                                                            rounded text-light py-1 px-4 roboto
                                                            fs-xpress-sm-200 fw-xpress-500 mt-1"
                                                            type="button" @click="applyValue($event)"
                                                            :data-name="category.name">
                                                            {{ category.name }}</button>

                                                    </div>

                                                </template>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- price -->
                                    <div class="col-3">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="price">PRICE 
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                                type="number" step="0.01" name="price" required 
                                                v-model="productForm.price" />
                                        </div>
                                    </div>

                                    <!-- discount -->
                                    <div class="col-3">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="discount">DISCOUNT 
                                                <span class="text-xpress-red-200 
                                                roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                                type="number" step="0.01" name="discount" required
                                                v-model="productForm.discount" />
                                        </div>
                                    </div>

                                    <!-- durationOfDeliveryByHour -->
                                    <div class="col-6">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="durationOfDeliveryByHour">
                                                How long does the delivery take in hours? 
                                                <span class="text-xpress-red-200 
                                                roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                                type="number" step="0.01" name="durationOfDeliveryByHour" required
                                                v-model="productForm.durationOfDeliveryByHour" />
                                        </div>
                                    </div>

                                    <!-- submit -->
                                    <div class="col-12">
                                        <div class="form-control p-0 border-0 mt-0 text-start
                                            d-flex justify-content-end align-items-end">
            
                                        <button class="btn bg-xpress-orange-100 
                                            bg-hover-xpress-to-gray-200 text-light w-25 
                                            rounded-pill py-1 fs-xpress-sm-300 
                                            fw-xpress-500"
                                            type="submit">CONFIRM</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                            
                        </div>
                                
                    </div>

                    <VendorSidebar />

                </div>

            </div>
            <!---------- Cart Xpress Login Main END -->

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    import $ from 'jquery';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/RegisterLayout/RegisterCover.vue';
    import VendorSidebar from '../../CartXpressLayout/ProfileLayout/VendorSidebar.vue';
    import { useForm } from '@inertiajs/inertia-vue3';
    import { ref, watch, reactive, provide } from 'vue';

    // actions & composables
    import callRegister from '../../Actions/register';
    import { useFile } from '../../Composables/UseFile';
    import { dynamicFilter } from '../../Composables/DynamicFilter';
    
    const { onFile } = useFile();
    const { filterItems } = dynamicFilter();

    callRegister();

    const props = defineProps({
        editable: Boolean,
        product: Object,
        category: Object,
        categories: Array,
        yourShops: Array,
        shopID: Number,
        hasLogin: Boolean
    });

    const productForm = useForm({
        shopID: 0,
        name: '',
        size: '1',
        description: '',
        quantityInStock: '',
        price: 0,
        discount: 0,
        durationOfDeliveryByHour: 1,
        imagePath: '',
        categoryName: ''
    });

    productForm.shopID = props.shopID;
    productForm.name = props.editable ? props.product.name : '',
    productForm.size = props.editable ? props.product.size : '1',
    productForm.description = props.editable ? props.product.description : '',
    productForm.quantityInStock = props.editable ? props.product.quantityInStock : '',
    productForm.price = props.editable ? props.product.price : 0,
    productForm.discount = props.editable ? props.product.discount : 0,
    productForm.durationOfDeliveryByHour = props.editable ? props.product.durationOfDeliveryByHour : 1,

    productForm.imagePath = props.editable ? 
        (props.product.imagePath.includes('source.unsplash.com') ?
            props.product.imagePath : '../' + props.product.imagePath) : '',

    productForm.categoryName = props.editable ? props.category.name : ''

    const searchInput = ref(null);

    function applyValue(event) {
        productForm.categoryName = event.currentTarget.dataset.name;
    }

    provide('hasLogin', reactive(props.hasLogin));
    provide('yourShops', props.yourShops);

    // SEARCH
    const searchProductValue = ref('');
    watch(searchProductValue, value => { searchProductValue.value = value; });

    function submitProduct() {
        if(props.editable) {

            console.log(productForm);
            productForm.patch(route('products.update', props.product.id));
        } else {
            productForm.post(route('products.store'));
        }
    }

</script>

<style lang="scss" scoped>

</style>