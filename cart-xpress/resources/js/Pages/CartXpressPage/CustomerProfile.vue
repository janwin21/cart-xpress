<template>

    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Profile Main START -->
            <div class="register">

                <div class="row">

                    <!-- right -->
                    <div class="col-9 p-0 pb-3">

                        <ProfileHeader />

                        <div class="wrapper bg-xpress-gray-100">

                            <Order color="purple-100" buttonName="YOUR SHOPPING CART"
                                   class-icon="fa-solid fa-cart-shopping" 
                                   :readOnly="false" :index="0">
                                   
                                <!-- order upper parts -->
                                <button class="btn bg-xpress-orange-200 float-end
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500">
                                            BUT IT NOW</button>
                                
                            </Order>

                            <Order color="orange-200" buttonName="PENDING ORDERS"
                                   class-icon="fa-solid fa-spinner" 
                                   :readOnly="true" :index="1" />

                            <Order color="green-200" buttonName="DELIVERED ORDERS"
                                   class-icon="fa-solid fa-check" 
                                   :readOnly="true" :index="2" />

                            <Order color="red-100" buttonName="CANCELLED ORDERS"
                                   class-icon="fa-solid fa-ban" 
                                   :readOnly="true" :index="3">
                        
                                <button class="btn bg-xpress-purple-100 float-end
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500">
                                            ADD TO CART</button>

                            </Order>
                    
                        </div>

                    </div>

                    <!-- left -->
                    <div class="register__left col-3 text-center p-0"
                                style="background: url('/images/wonderful-images/wonderful-image-6.jpg'
                                       no-repeat; background-size: cover;">

                        <div class="w-100 h-100 bg-opaque-xpress-black-200 px-4 pt-4
                                    d-flex flex-column justify-content-center align-items-center">

                            <img class="w-25" src="/images/icons/input-icon-2.png" alt="">
        
                            <h5 class="lato text-xpress-blue-300 
                                        fs-xpress-sm-400 fw-xpress-600 mx-4 mt-3 mb-5">
                                        VENDOR</h5>

                            <p class="roboto text-light 
                                    fs-xpress-sm-200">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Quidem, dignissimos quod quibusdam fugiat recusandae 
                                    repellat deserunt odio numquam adipisci in fuga. 
                                    Neque molestiae inventore deserunt blanditiis 
                                    tenetur tempore ipsa sunt.</p>
        
                            <a class="btn bg-xpress-pink-100 
                                            bg-hover-xpress-to-gray-200 text-light w-75 
                                            rounded-pill py-1 fs-xpress-sm-300 
                                            fw-xpress-600 mt-5"
                                            id="customer-confirm-btn">
                                            BE A VENDOR</a>

                        </div>
                        
                    </div>

                </div>

            </div>
            <!---------- Cart Xpress Profile Main END -->

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/Components/RegisterLayout/RegisterCover.vue';
    import ProfileHeader from '../../CartXpressLayout/Components/ProfileLayout/ProfileHeader.vue';
    import Order from '../../CartXpressLayout/Components/ProfileLayout/Order.vue';

    // actions & composables
    import callRegister from '../../Actions/register';
    import callProfile from '../../Actions/profile';

    callRegister();
    callProfile();

</script>

<style lang="scss" scoped>

</style>