<template> 
    
    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Profile Main START -->
            <div class="register w-100">

                <div class="row">

                    <RightSidebar />

                    <VendorSidebar v-if="!userProps.restricted" />

                    <EmployeeSidebar v-if="userProps.restricted" />
                    
                </div>
            

            </div>

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    import { reactive, provide } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/RegisterLayout/RegisterCover.vue';
    import RightSidebar from '../../CartXpressLayout/ProfileLayout/RightSidebar.vue';
    import VendorSidebar from '../../CartXpressLayout/ProfileLayout/VendorSidebar.vue';
    import EmployeeSidebar from '../../CartXpressLayout/ProfileLayout/EmployeeSidebar.vue';

    // actions & composables
    import callRegister from '../../Actions/register';
    import callProfile from '../../Actions/profile';

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
        restricted: Boolean,
        hasLogin: Boolean
    });
    
    provide('hasLogin', reactive(userProps.hasLogin))
    provide('userProps', userProps);
    provide('yourShops', userProps.yourShops);

</script>

<style lang="scss" scoped>

</style>