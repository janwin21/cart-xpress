<template>  

    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Login Main START -->
            <div class="register">

                <div class="row">

                    <!-- right -->
                    <div class="col-9 bg-xpress-gray-100 p-0 pb-5">

                        <!-- customer component -->
                        <div class="customer-component">

                            <WelcomeHeader>

                                <template #header>Create You Own Shop!</template>

                                <template #paragraph>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                    Ab, officiis velit? Molestiae id dolorum, 
                                    soluta similique fuga nobis quisquam.
                                </template>

                            </WelcomeHeader>

                            <form action="javascript: void(0)">

                                <!-- first row -->
                                <div class="row gx-2 gy-4 px-5 pt-4 pb-0 mt-2">

                                    <!-- name -->
                                    <FormControl labelName="SHOP NAME" type="text" 
                                                inputName="name" :required="true" />

                                    <!-- email -->
                                    <FormControl labelName="SHOP EMAIL ADDRESS" type="email" 
                                                inputName="email" :required="true" />

                                    <!-- phone -->
                                    <FormControl labelName="SHOP CONTACT #" type="text" 
                                                inputName="phone" :required="true" />

                                    <!-- description -->
                                    <div class="col-12">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="description">DESCRIBE YOUR SHOP 
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <textarea class="roboto text-xpress-gray-300 
                                                    bg-xpress-gray-500 border-0 py-2 fw-xpress-500 
                                                            fs-xpress-sm-300 rounded w-100 mt-1 px-3"
                                                            name="description" 
                                                            placeholder="type the message here..."
                                                            style="height: 150px;" required></textarea>
                                        </div>
                                    </div>
                                    
                                    <!-- your location warning notes -->
                                    <div class="col-4">
                                        <h6 class="roboto text-xpress-red-200 fs-xpress-sm-300">YOUR LOCATION</h6>
                                        <p class="roboto text-light fs-xpress-sm-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus deserunt quia aperiam sed id</p>
                                    </div>

                                    <!-- address lines -->
                                    <div class="col-8">

                                        <!-- addressLine1 -->
                                        <div class="form-control p-0 rounded-0 border-0">
                                            
                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="addressLine1">ADDRESS LINE 1
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                name="addressLine1" required>
                                        </div>

                                        <!-- addressLine2 -->
                                        <div class="form-control p-0 rounded-0 border-0 mt-3">
                                            
                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="addressLine2">ADDRESS LINE 2
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                name="addressLine2" required>
                                        </div>

                                    </div>

                                    <!-- city -->
                                    <FormControl col="3" labelName="CITY" type="text" 
                                                inputName="city" :required="true" />

                                    <!-- state -->
                                    <FormControl col="3" labelName="STATE" type="text" 
                                                inputName="state" :required="true" />

                                    <!-- postalCode -->
                                    <FormControl col="3" labelName="POSTAL CODE" type="text" 
                                                inputName="postalCode" :required="true" />

                                    <!-- country -->
                                    <FormControl col="3" labelName="COUNTRY" type="text" 
                                                inputName="country" :required="true" />

                                    <!-- display background image -->
                                    <div class="col-8" style="height: 250px">

                                        <img id="backgroundImageDisplay" 
                                            class="w-100 h-100 rounded" 
                                            src="/images/alphabetical-backgrounds/a-profile-background.jpg" alt="">
                                    </div>

                                    <!-- display profile image -->
                                    <div class="col-4" style="height: 250px"></div>

                                    <!-- backgroundImagePath -->
                                    <div class="col-2">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="backgroundImagePath">SHOP IMAGE
                                                <span class="text-xpress-red-200 
                                                        roboto fw-xpress-900">*</span></label>
        
                                            <button class="btn bg-xpress-pink-100 
                                                        bg-hover-xpress-to-gray-200 text-light w-100
                                                        rounded py-1 fs-xpress-sm-300 
                                                        fw-xpress-600 mt-1"
                                                        id="background-btn"
                                                        data-is-profile="false"
                                                        type="button">
                                                        UPLOAD</button>

                                            <input class="d-none" id="backgroundImagePath" type="file" name="backgroundImagePath">
                                        </div>
                                    </div>

                                    <!-- profileImagePath -->
                                    <div class="col-2"></div>

                                    <!-- submit -->
                                    <div class="col-12">
                                        <div class="form-control p-0 border-0 mt-0 text-start
                                                    d-flex justify-content-end align-items-end">
            
                                        <Link class="btn bg-xpress-orange-100 
                                                        bg-hover-xpress-to-gray-200 text-light w-25 
                                                        rounded-pill py-1 fs-xpress-sm-300 
                                                        fw-xpress-500"
                                                        :href="route('profile')"
                                                        type="submit">CONFIRM</Link>
                                        </div>
                                    </div>

                                </div>

                            </form>
                            
                        </div>
                                
                    </div>

                    <VendorSidebar />

                </div>

            </div>
            <!---------- Cart Xpress Login Main END -->

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/RegisterLayout/RegisterCover.vue';
    import WelcomeHeader from '../../CartXpressLayout/RegisterLayout/WelcomeHeader.vue';
    import FormControl from '../../CartXpressLayout/RegisterLayout/Elements/FormControl.vue';
    import VendorSidebar from '../../CartXpressLayout/ProfileLayout/VendorSidebar.vue';
    import { Link } from '@inertiajs/inertia-vue3';

    // actions & composables
    import callRegister from '../../Actions/register';

    callRegister();

</script>

<style lang="scss" scoped>

</style>