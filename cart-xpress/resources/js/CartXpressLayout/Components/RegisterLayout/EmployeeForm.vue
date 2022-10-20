<template>
    <form action="javascript: void(0)">

        <!-- first row -->
        <div class="row gx-2 gy-4 px-5 pt-4 pb-0 mt-2">

            <!-- firstName -->
            <FormControl labelName="FIRST NAME" type="text" 
                         inputName="firstName" :required="true" />

            <!-- lastName -->
            <FormControl labelName="LAST NAME" type="text" 
                         inputName="lastName" :required="true" />

            <!-- phone -->
            <FormControl labelName="PHONE" type="text" 
                         inputName="phone" :required="true" />

            <!-- email -->
            <FormControl col="6" labelName="EMAIL" type="email" 
                         inputName="email" :required="true" />

            <!-- password -->
            <FormControl col="6" labelName="PASSWORD" type="password" 
                         inputName="password" :required="true" />

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
                                    UPLOAD</button>

                    <input class="d-none" id="profileImagePath" type="file" name="profileImagePath">
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
                                    UPLOAD</button>

                    <input class="d-none" id="backgroundImagePath" type="file" name="backgroundImagePath">
                </div>
            </div>

            <div class="col-2"></div>

            <!-- password_confirmation -->
            <FormControl col="6" labelName="CONFIRM PASSWORD" type="password_confirmation" 
                         inputName="password_confirmation" :required="true" />

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

                    <input type="checkbox" name="remember_me">

                    <label class="roboto text-light fs-xpress-sm-200 ms-2" 
                            for="remember_me">
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
                                fw-xpress-500" href="#"
                                type="submit">CONFIRM</button>
                </div>
            </div>

        </div>

        <teleport to="#popup">
            <div ref="termsAndAgreementRef" style=" display: none;">
                <TermsAndAgreementModal />
            </div>
        </teleport>

    </form>
</template>

<script setup>
    import FormControl from './Elements/FormControl.vue';
    import TermsAndAgreementModal from '../../../CartXpressModal/TermsAndAgreementModal.vue';
    import { Link } from '@inertiajs/inertia-vue3';
    import { usePopup } from '../../../Composables/UsePopup';
    import { provide } from 'vue';

    const { termsAndAgreementRef, 
            showTermsOfAgreementPopup } = usePopup();

    provide('showTermsOfAgreementPopup', showTermsOfAgreementPopup);

</script>

<style lang="scss" scoped>

</style>