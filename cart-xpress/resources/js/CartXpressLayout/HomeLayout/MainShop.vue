<template>
    <!-------------------------------- Cart Xpress Shop Main Content START -->
    <div class="cart-xpress-main-content container-fluid p-0">

        <!-- border line design -->
        <div class="row bg-light m-0" style="height: 0.75rem">
            <div class="col-4 h-100 bg-xpress-orange-100"></div>
            <div class="col-4 h-100"></div>
            <div class="col-4 h-100 bg-xpress-purple-300"></div>
        </div>

        <div class="bg-xpress-gray-100 
                    w-100 pe-3 py-3">
        
            <div class="row m-0 h-100">
                <slot name="cart-sidebar" /> 

                <!-- cart sidebar left column space -->
                <div class="cart-sidebar-space col-3 p-0 shrink-it-vertical"></div>

                <!-- main bar -->
                <div class="col-9 ps-4">

                    <slot name="main-shop-header" /> 

                    <slot name="main-shop-popular" /> 

                    <slot name="main-categories" /> 

                </div>

                <slot name="right-sidebar" />

            </div>
        </div>

    </div>
    <!---------- Cart Xpress Shop Main Content END -->
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>