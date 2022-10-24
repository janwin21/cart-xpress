<template> 
    
    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Profile Main START -->
            <div class="register">

                <div class="row">

                    <RightSidebar />

                    <VendorSidebar />
                    
                </div>
            

            </div>

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/RegisterLayout/RegisterCover.vue';
    import RightSidebar from '../../CartXpressLayout/ProfileLayout/RightSidebar.vue';
    import VendorSidebar from '../../CartXpressLayout/ProfileLayout/VendorSidebar.vue';

    // actions & composables
    import callRegister from '../../Actions/register';
    import callProfile from '../../Actions/profile';
    import { provide } from '@vue/runtime-core';

    callRegister();
    callProfile();

    const userProps = defineProps({
        user: Object,
        userProfile: Object,
        onCartOrders: Array,
        pendingOrders: Array,
        deliveredOrders: Array,
        cancelledOrders: Array,
        yourShops: Array,
        restricted: Boolean
    });

    provide('userProps', userProps);
    provide('yourShops', userProps.yourShops);

</script>

<style lang="scss" scoped>

</style>