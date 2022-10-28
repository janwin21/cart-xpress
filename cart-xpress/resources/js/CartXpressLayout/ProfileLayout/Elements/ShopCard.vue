<template>
    <!-- shop item -->
    <div class="col">

        <a :href="route('shops.show', props.shop.id)">

            <div class="shop-box position-relative" 
                style="height: 250px;">

                <!-- cover -->
                <div class="position-absolute 
                            top-0 left-0 w-100 h-100">

                    <img class="w-100 h-100" 
                        :src="props.shop.backgroundImagePath" alt="shop image" 
                        style="object-fit: cover;">
                </div>

                <div class="position-absolute 
                            top-0 left-0 w-100 h-100
                            d-flex flex-column
                            justify-content-center
                            align-items-center
                            gradient-transparent-to-bg-gray-100">

                    <h3 class="roboto text-light 
                            mb-0 fs-xpress-sm-600">
                            {{ props.shop.name }}</h3>

                    <h4 class="roboto text-light fw-xpress-400 
                            mt-2 mb-0 fs-xpress-sm-300">
                            {{ props.shop.city }}</h4>
                </div>

            </div>
            
        </a>

    </div>
</template>

<script setup>
    import { link } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        shop: Object
    });

</script>

<style lang="scss" scoped>

</style>