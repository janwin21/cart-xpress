<template>

    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Login Main START -->
            <div class="register">

                <div class="row">

                    <div class="col-9 bg-xpress-gray-100 p-0 pb-5">

                        <!-- customer component -->
                        <div class="customer-component">

                            <!-- welcome header -->
                            <div class="welcome-header 
                                        border border-top-0 border-start-0 
                                        border-end-0 border-bottom-1 
                                        text-center px-5 pt-5 pb-4">
                                        
                                <h4 class="roboto text-xpress-blue-300">Create New Category</h4>

                                <p class="roboto text-light mt-3">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Esse minima, quaerat rem eum modi excepturi adipisci perspiciatis itaque 
                                    eaque ipsum, illum soluta at nesciunt.</p>
                            </div>

                            <form @submit.prevent="categoryForm.post(route('categories.store'))">

                                <!-- first row -->
                                <div class="row gx-2 gy-4 px-5 pt-4 pb-0 mt-2">

                                    <!-- categoryName -->
                                    <div class="col-12">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="categoryName">CATEGORY NAME 
                                                <span class="text-xpress-red-200 roboto fw-xpress-900">*</span></label>

                                            <input class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                                                name="categoryName" required
                                                v-model="categoryForm.name" />
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-12">
                                        <div class="form-control p-0 rounded-0 border-0">

                                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                                for="description">DESCRIBE NEW CATEGORY 
                                                <span class="text-xpress-red-200 
                                                roboto fw-xpress-900">*</span></label>

                                            <textarea class="roboto text-xpress-gray-300 
                                                bg-xpress-gray-500 border-0 py-2 fw-xpress-500 
                                                fs-xpress-sm-300 rounded w-100 mt-1 px-3"
                                                name="description" 
                                                placeholder="type the message here..."
                                                style="height: 150px;" required
                                                v-model="categoryForm.description" />
                                        </div>
                                    </div>

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
                                                UPLOAD
                                            </button>

                                            <input class="d-none" id="backgroundImagePath" type="file" name="backgroundImagePath" required    
                                            @change="categoryForm.backgroundImagePath = onFile($event)" />
                                        </div>
                                    </div>

                                    <!-- profileImagePath -->
                                    <div class="col-2"></div>

                                    <!-- submit -->
                                    <div class="col-12">
                                        <div class="form-control p-0 border-0 mt-0 text-start
                                                    d-flex justify-content-end align-items-end">
            
                                        <button class="btn bg-xpress-orange-100 
                                            bg-hover-xpress-to-gray-200 text-light w-25 
                                            rounded-pill py-1 fs-xpress-sm-300 
                                            fw-xpress-500"
                                            type="submit">CONFIRM</button>
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
    import VendorSidebar from '../../CartXpressLayout/ProfileLayout/VendorSidebar.vue';
    import { useForm } from '@inertiajs/inertia-vue3';
    import { provide, reactive } from 'vue';

    // actions & composables
    import { useFile } from '../../Composables/UseFile';
    import callRegister from '../../Actions/register';
    
    const { onFile } = useFile();
    callRegister();

    const categoryForm = useForm({
        name: '',
        description: '',
        backgroundImagePath: ''
    });

    const userProps = defineProps({
        yourShops: Array,
        hasLogin: Boolean
    });

    provide('hasLogin', reactive(userProps.hasLogin))
    provide('yourShops', userProps.yourShops);

</script>

<style lang="scss" scoped>

</style>