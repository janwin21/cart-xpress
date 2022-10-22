<template>   
    <!-------------------------------- Shop Content START -->   
    <div class="shop-content p-4
                bg-xpress-gray-200 container-fluid">

        <slot name="background-cover" />

        <div class="row">

            <div class="col-2">
                <img class="rounded w-100" 
                    :src="props.shop.mainVendor.profileImagePath" alt="main vendor image" 
                    style="height: 175px;">    
            </div>

            <div class="col-10 d-flex flex-wrap justify-content-between">

                <h4 class="d-inline roboto text-light 
                            mb-1 fs-xpress-sm-500 w-50">
                            {{ props.shop.name }}

                            <Link v-if="$page.component !== 'CartXpressPage/Shop'" 
                                class="btn bg-success
                                bg-hover-xpress-to-gray-200 text-light
                                rounded fs-xpress-sm-100 p-1 px-2 ms-2
                                fw-xpress-600"
                                :href="route('shops.show', props.shop.id)"
                                id="background-btn">
                                <i class="fa-solid fa-eye fs-xpress-sm-400"></i></Link>
                </h4>

                <h4 class="d-inline roboto text-light 
                            mb-1 fs-xpress-sm-500 w-50 text-end">
                            {{ props.shop.city }}, 
                            {{ props.shop.state }}, 
                            {{ props.shop.country }}</h4>

                <h4 class="d-inline roboto text-xpress-gray-600 
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-50 mt-1">
                            {{ props.shop.email }}</h4>

                <h4 class="d-inline roboto text-xpress-gray-600 
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-50 mt-1 text-end">
                            {{ props.shop.postalCode }}</h4>

                <h4 class="d-inline roboto text-light mt-4
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-50">
                            <span class="text-xpress-gray-600 fs-xpress-sm-300 fw-xpress-500">MAIN VENDOR:</span> {{ props.shop.mainVendor.firstName }} 
                            {{ props.shop.mainVendor.lastName }}</h4>

                <h4 class="d-inline roboto text-light mt-4
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-50 text-end">
                            <span class="text-xpress-gray-600 fs-xpress-sm-300 fw-xpress-500">
                                CONTACT NO:</span> {{ props.shop.phone }}</h4>

                <h4 class="d-inline roboto text-light mt-4 
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-100">
                            {{ props.shop.addressLine1 }}</h4>

                <h4 class="d-inline roboto text-light mt-2
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-100">
                            {{ props.shop.addressLine2 }}</h4>
                        
            </div>

        </div>

    </div>
    <!---------- Shop Content END -->
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        shop: Object
    });

</script>

<style lang="scss" scoped>

</style>