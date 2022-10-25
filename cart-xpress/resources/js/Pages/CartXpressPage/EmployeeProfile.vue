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

                            <!-- on-cart that need to deliver -->
                            <Order :orders="props.pendingOrders" 
                                   color="orange-200" buttonName="PENDING ORDERS"
                                   class-icon="fa-solid fa-cart-shopping" 
                                   :readOnly="true" :index="1">
                                   
                                <!-- order upper parts -->
                                <Link class="btn bg-xpress-pink-100 float-end
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500">
                                    PROVIDE SERVICE</Link>
                                
                            </Order>

                            <Shop :shops="shops" />

                            <Assignment />
            
                        </div>

                    </div>

                    <!-- left -->
                    <div class="register__left col-3 text-center p-0"
                        style="background: url('/images/wonderful-images/wonderful-image-6.jpg') no-repeat;
                            background-size: cover;">

                        <div class="w-100 h-100 bg-opaque-xpress-black-200 px-4 pt-4
                                    d-flex flex-column justify-content-center align-items-center">

                            <img class="w-25" src="/images/icons/unauthorize-icon-2.png" alt="">

                            <h5 class="lato text-xpress-blue-300 
                                fs-xpress-sm-300 fw-xpress-600 mx-4 mt-3 mb-5">
                                YOU ARE NOT AUTHORIZE TO ACCESS</h5>

                            <p class="roboto text-light 
                                fs-xpress-sm-200">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Quidem, dignissimos quod quibusdam fugiat recusandae 
                                repellat deserunt odio numquam adipisci in fuga. 
                                Neque molestiae inventore deserunt blanditiis 
                                tenetur tempore ipsa sunt.</p>

                            <a class="btn bg-xpress-gray-100 
                                bg-hover-xpress-to-gray-200 text-light w-75 
                                rounded-pill py-1 fs-xpress-sm-300 
                                fw-xpress-600 mt-5"
                                id="customer-confirm-btn" disabled>
                                LOCKED FEATURE</a>

                        </div>

                    </div>

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

    console.log(props.hasLogin);
    
    provide('hasLogin', reactive(props.hasLogin))
    provide('customers', props.customers);
    provide('employees', props.employees);
    provide('needToAssignCustomers', props.needToAssignCustomers);

</script>

<style lang="scss" scoped>

</style>