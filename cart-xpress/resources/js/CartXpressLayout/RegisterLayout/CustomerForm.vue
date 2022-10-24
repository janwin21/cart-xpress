<template>
    <!-- customer form -->
    <form @submit.prevent="customerSubmit" enctype="multipart/form-data">

        <!-- first row -->
        <div class="row gx-2 gy-4 px-5 pt-4 pb-0 mt-2">

            <!-- firstName -->
            <FormControl col="6" labelName="FIRST NAME" type="text" 
                inputName="firstName" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="form.firstName" name="firstName" :required="true" />
            
            </FormControl>

            <!-- lastName -->
            <FormControl col="6" labelName="LAST NAME" type="text" 
                inputName="lastName" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="form.lastName" name="lastName" :required="true" />
            
            </FormControl>

            <!-- phone -->
            <FormControl labelName="PHONE" type="text" 
                inputName="phone" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="form.phone" name="phone" :required="true" />
            
            </FormControl>

            <!-- email -->
            <FormControl col="5" labelName="EMAIL" type="email" 
                inputName="email" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="email" 
                    v-model="form.email" name="email" :required="true" />
            
            </FormControl>

            <!-- creditLimit -->
            <FormControl col="3" labelName="CREDIT LIMIT" type="number" 
                inputName="creditLimit" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="number" 
                    v-model="customerForm.creditLimit" name="creditLimit" :required="true" />
            
            </FormControl>

            <!-- password -->
            <FormControl col="6" labelName="PASSWORD" type="password" 
                inputName="password" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="password" 
                    v-model="form.password" name="password" :required="true" />
            
            </FormControl>

            <!-- password_confirmation -->
            <FormControl col="6" labelName="CONFIRM PASSWORD" type="password" 
                inputName="password_confirmation" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="password" 
                    v-model="form.password_confirmation" 
                    name="password_confirmation" :required="true" />
            
            </FormControl>
            
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
                        for="addressLine1">ADDRESS LINE 1</label>

                    <input class="roboto text-xpress-gray-300 
                        bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                        fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                        name="addressLine1" v-model="customerForm.addressLine1">
                </div>

                <!-- addressLine2 -->
                <div class="form-control p-0 rounded-0 border-0 mt-3">
                    
                    <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                        for="addressLine2">ADDRESS LINE 2</label>

                    <input class="roboto text-xpress-gray-300 
                        bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                        fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                        name="addressLine2" v-model="customerForm.addressLine2">
                </div>

            </div>

            <!-- city -->
            <FormControl col="3" labelName="CITY" type="text" 
                inputName="city" :required="false">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="customerForm.city" name="city" :required="false" />
            
            </FormControl>

            <!-- state -->
            <FormControl col="3" labelName="STATE" type="text" 
                inputName="state" :required="false">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="customerForm.state" name="state" :required="false" />
            
            </FormControl>

            <!-- postalCode -->
            <FormControl col="3" labelName="POSTAL CODE" type="text" 
                inputName="postalCode" :required="false">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="customerForm.postalCode" name="postalCode" :required="false" />
            
            </FormControl>

            <!-- country -->
            <FormControl col="3" labelName="COUNTRY" type="text" 
                inputName="country" :required="false">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="customerForm.country" name="country" :required="false" />
            
            </FormControl>

            <!-- display profile image -->
            <div class="col-4" style="height: 250px">

                <img id="profileImageDisplay" 
                    class="w-100 h-100 rounded" 
                    src="/images/alphabetical-profile/a-profile.jpg" alt="">
            </div>

            <!-- display background image -->
            <div class="col-8" style="height: 250px">

                <img id="backgroundImageDisplay" 
                    class="w-100 h-100 rounded" 
                    src="/images/alphabetical-backgrounds/a-profile-background.jpg" alt="">
            </div>

            <!-- profileImagePath -->
            <div class="col-2">
                <div class="form-control p-0 rounded-0 border-0">

                    <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                        for="profileImagePath">PROFILE</label>

                    <button class="btn bg-xpress-orange-100 
                        bg-hover-xpress-to-gray-200 text-light w-100
                        rounded py-1 fs-xpress-sm-300 
                        fw-xpress-600 mt-1"
                        id="profile-btn"
                        data-is-profile="true"
                        type="button">
                        UPLOAD
                    </button>

                    <input class="d-none" id="profileImagePath" 
                        type="file" name="profileImagePath" 
                        @change="form.profileImagePath = onFile($event)">

                </div>
            </div>

            <!-- backgroundImagePath -->
            <div class="col-2">
                <div class="form-control p-0 rounded-0 border-0">

                    <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                        for="backgroundImagePath">BACKGROUND</label>

                    <button class="btn bg-xpress-purple-300 
                        bg-hover-xpress-to-gray-200 text-light w-100
                        rounded py-1 fs-xpress-sm-300 
                        fw-xpress-600 mt-1"
                        id="background-btn"
                        data-is-profile="false"
                        type="button">
                        UPLOAD
                    </button>

                    <input class="d-none" id="backgroundImagePath" 
                        type="file" name="backgroundImagePath"
                        @change="form.backgroundImagePath = onFile($event)">

                </div>
            </div>

            <!-- acceptAgreement -->
            <div class="col-12">

                <div class="form-control p-0 border-0 mt-0 text-start
                            d-flex justify-content-start align-items-center">

                    <input type="checkbox" name="acceptAgreement" 
                        v-model="form.acceptAgreement">

                    <label class="roboto text-light fs-xpress-sm-200 ms-2" 
                            for="acceptAgreement">
                            Accept our 

                        <span class="text-xpress-blue-100">
                            <a @click.prevent="showTermsOfAgreementPopup()" 
                                href="#">Terms Agreement</a>
                        </span>

                    </label>

                </div>

            </div>

            <!-- submit -->
            <div class="col-12">
                <div class="form-control p-0 border-0 mt-0 text-start
                    d-flex justify-content-end align-items-end">

                    <button class="btn bg-xpress-orange-100 
                        bg-hover-xpress-to-gray-200 text-light w-25 
                        rounded-pill py-1 fs-xpress-sm-300 
                        fw-xpress-500" :disabled="form.processing"
                        @click="form.isHired = false"
                        type="submit">CONFIRM
                    </button>

                </div>
            </div>

        </div>

        <teleport to="#popup">
            <div ref="termsAndAgreementRef" style="display: none;">
                <TermsAndAgreementModal />
            </div>
        </teleport>

    </form>
</template>

<script setup>
    import FormControl from './Elements/FormControl.vue';
    import TermsAndAgreementModal from '../../CartXpressModal/TermsAndAgreementModal.vue';
    import { Link, useForm } from '@inertiajs/inertia-vue3';
    import { usePopup } from '../../Composables/UsePopup';
    import { useFile } from '../../Composables/UseFile';
    import { provide } from 'vue';

    const { termsAndAgreementRef, showTermsOfAgreementPopup } = usePopup();
    const { onFile } = useFile();

    provide('showTermsOfAgreementPopup', showTermsOfAgreementPopup);

    const customerForm = useForm({
        addressLine1: '',
        addressLine2: '',
        city: '',
        state: '',
        postalCode: '',
        country: '',
        creditLimit: 0,
    });

    const form = useForm({
        firstName: '',
        lastName: '',
        phone: '',
        email: '',
        password: '',
        password_confirmation: '',
        profileImagePath: '',
        backgroundImagePath: '',
        acceptAgreement: false,
        isHired: false,
        customer: customerForm
    });

    const customerSubmit = () => {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

</script>

<style lang="scss" scoped>

</style>