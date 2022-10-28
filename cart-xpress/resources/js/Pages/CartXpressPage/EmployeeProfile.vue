<template>

    <CartXpressAppLayout>

        <RegisterCover>
            
            <!-------------------------------- Cart Xpress Profile Main START -->
            <div class="register">

                <div class="row">

                    <!-- right -->
                    <div class="col-9 p-0 pb-3">

                        <ProfileHeader :user="props.user" :user-profile="props.user" />

                        <!-- employee management section -->
                        <div class="wrapper bg-xpress-gray-100">

                            <Customer :index="0" :customers="customers" />

                            <!-- on-cart that need to deliver
                            <Order :orders="props.pendingOrders" 
                                   color="orange-200" buttonName="PENDING ORDERS"
                                   class-icon="fa-solid fa-cart-shopping" 
                                   :readOnly="true" :index="1">

                                <Link class="btn bg-xpress-pink-100 float-end
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500">
                                    PROVIDE SERVICE</Link>
                                
                            </Order>-->

                            <Shop :shops="shops" />

                            <Assignment />
            
                        </div>

                    </div>

                    <EmployeeSidebar />

                </div>

            </div>
            <!---------- Cart Xpress Profile Main END -->

        </RegisterCover>

    </CartXpressAppLayout>
</template>

<script setup>
    import { provide, reactive } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/RegisterLayout/RegisterCover.vue';
    import ProfileHeader from '../../CartXpressLayout/ProfileLayout/ProfileHeader.vue';
    import Order from '../../CartXpressLayout/ProfileLayout/Order.vue';
    import Customer from '../../CartXpressLayout/ProfileLayout/Customer.vue';
    import Shop from '../../CartXpressLayout/ProfileLayout/Shop.vue';
    import Assignment from '../../CartXpressLayout/ProfileLayout/Assignment.vue';
    import EmployeeSidebar from '../../CartXpressLayout/ProfileLayout/EmployeeSidebar.vue';
    import { Link } from '@inertiajs/inertia-vue3';

    // actions & composables
    import callRegister from '../../Actions/register';
    import callProfile from '../../Actions/profile';

    callRegister();
    callProfile();

    const props = defineProps({
        user: Object,
        pendingOrders: Array,
        customers: Array,
        shops: Array,
        employees: Object,
        needToAssignCustomers: Object,
        hasLogin: Boolean
    });
    
    provide('hasLogin', reactive(props.hasLogin))
    provide('customers', props.customers);
    provide('employees', props.employees);
    provide('needToAssignCustomers', props.needToAssignCustomers);

</script>

<style lang="scss" scoped>

</style>