<template>
    <!-- left -->
    <div class="register__left col-3 text-center p-0"
                style="background: url('/images/wonderful-images/wonderful-image-6.jpg') 
                       no-repeat; background-size: cover;">

        <div class="w-100 h-100 bg-opaque-xpress-black-200" style="overflow-y: auto;">

            <!-- left header -->
            <div class="vendor-header px-3 py-2 text-start 
                        border-bottom-blue-200">

                <img class="d-inline" 
                    src="/images/icons/input-icon-2.png" alt="" 
                    style="width: 1.5rem;">

                <h5 class="d-inline lato text-xpress-blue-300 
                            fs-xpress-sm-300 fw-xpress-600">
                            VENDOR</h5>
            </div>

            <!-- vendor buttons -->
            <div class="row row-cols-1 m-0 g-1 p-3 pb-0">

                <div class="col">

                    <Link class="btn bg-xpress-pink-100 w-100 m-0
                            bg-hover-xpress-to-gray-200 text-light w-75 
                            rounded pt-1 pb-2 fs-xpress-sm-200 
                            fw-xpress-500"
                            id="customer-confirm-btn"
                            :href="route('pages.form.shop')">
                            ADD NEW<br>SHOP</Link>
                </div>

            </div>

            <!-- shops -->
            <div class="shops px-3 pb-3">

                <!-- single shop item -->
                <div class="position-relative shop-item mt-3" 
                    style="height: 150px;">

                    <a href="#">
                
                        <img class="rounded w-100 h-100" 
                            src="/images/sample-shops/sample-shop-1.jpg" alt=""
                            style="object-fit: cover;">
                        
                        <div class="shop-item-cover rounded-bottom 
                                    text-start bg-xpress-gray-200
                                    position-absolute bottom-0 left-0 w-100 p-2">

                            <h5 class="d-inline lato 
                                    text-xpress-blue-300 
                                    fs-xpress-sm-300 fw-xpress-600">
                                    shopName</h5>
                        </div>
                        
                        <div class="shop-item-cover rounded-bottom text-end 
                                    position-absolute top-0 right-0 w-100 p-2">

                            <button class="btn bg-xpress-red-100
                                            bg-hover-xpress-to-gray-200 text-light
                                            rounded fs-xpress-sm-100 
                                            fw-xpress-600"
                                            id="background-btn">
                                            <i class="fa-solid fa-trash"></i>
                                            </button>
                        </div>
                        
                    </a>
                
                </div>

            </div>

        </div>
        
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

</script>

<style lang="scss" scoped>

</style>