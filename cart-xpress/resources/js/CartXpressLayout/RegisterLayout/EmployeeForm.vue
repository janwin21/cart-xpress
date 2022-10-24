<template>
    <!-- employee form -->
    <form @submit.prevent="employeeSubmit" enctype="multipart/form-data">

        <!-- first row -->
        <div class="row gx-2 gy-4 px-5 pt-4 pb-0 mt-2">

            <!-- firstName -->
            <FormControl labelName="FIRST NAME" type="text" 
                inputName="firstName" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    v-model="form.firstName" name="firstName" :required="true" />
            
            </FormControl>

            <!-- lastName -->
            <FormControl labelName="LAST NAME" type="text" 
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
            <FormControl labelName="EMAIL" type="email" 
                inputName="email" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="email" 
                    v-model="form.email" name="email" :required="true" />
            
            </FormControl>

            <!-- password -->
            <FormControl labelName="PASSWORD" type="password" 
                inputName="password" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="password" 
                    v-model="form.password" name="password" :required="true" />
            
            </FormControl>

            <!-- password_confirmation -->
            <FormControl labelName="CONFIRM PASSWORD" type="password" 
                inputName="password_confirmation" :required="true">

                <input class="roboto text-xpress-gray-300 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500 
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="password" 
                    v-model="form.password_confirmation" 
                    name="password_confirmation" :required="true" />
            
            </FormControl>

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

            <div class="col-8"></div>

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
            
            <!-- your location warning notes -->
            <div class="col-12">

                <h6 class="roboto text-xpress-blue-200 
                        fs-xpress-sm-300 mt-3">ACCOUNT ACCESSIBILITY</h6>

                <p class="roboto text-light mt-3 fs-xpress-sm-200">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat.
                    <br><br>
                    
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <!-- acceptAgreement -->
            <div class="col-12">

                <div class="form-control p-0 border-0 mt-0 text-start
                            d-flex justify-content-start align-items-center">

                    <input type="checkbox" name="acceptAgreement" 
                        v-model="form.acceptAgreement">

                    <label class="roboto text-light fs-xpress-sm-200 ms-2" 
                            for="acceptAgreement">Accept our 

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
                    @click="form.isHired = true"
                    type="submit">CONFIRM</button>
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

    const { termsAndAgreementRef, 
            showTermsOfAgreementPopup } = usePopup();
    const { onFile } = useFile();

    provide('showTermsOfAgreementPopup', showTermsOfAgreementPopup);

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
        isHired: false
    });

    const employeeSubmit = () => {
        form.post(route('register'), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    };

</script>

<style lang="scss" scoped>

</style>