<template>
    <!-- user item -->
    <div class="col">

        <Link :href="route('customers.show', customer.id)">

            <div class="user-box position-relative" 
                style="height: 250px;">

                <!-- cover -->
                <div class="position-absolute 
                            top-0 left-0 w-100 h-100">

                    <img class="w-100 h-100" 
                        :src="customer.backgroundImagePath" alt="" 
                        style="object-fit: cover;">
                </div>

                <div class="position-absolute 
                            top-0 left-0 w-100 h-100
                            d-flex flex-column
                            justify-content-center
                            align-items-center
                            gradient-transparent-to-bg-gray-100">
                
                    <img class="border border-3 rounded-circle" 
                        :src="customer.profileImagePath" alt="" 
                        style="width: 35%; object-fit: cover;">

                    <h4 class="roboto text-light 
                            mt-5 mb-0 fs-xpress-sm-400">
                            {{ customer.lastName }}</h4>

                    <h4 class="roboto text-light 
                            my-0 fs-xpress-sm-300">
                            {{ customer.firstName }}</h4>
                </div>

            </div>
            
        </Link>

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        customer: Object
    });

</script>

<style lang="scss" scoped>

</style>