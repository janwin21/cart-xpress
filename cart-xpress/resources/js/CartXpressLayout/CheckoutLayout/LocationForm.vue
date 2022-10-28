<template>  
    <!-- address content -->
    <div class="col-10">

        <div class="row position-relative">

            <!-- your profile background images -->
            <div class="w-100 h-100 p-0 position-absolute top-0 left-0 bg-primary">

                <img class="w-100 h-100" 
                    :src="yourProfile.backgroundImagePath" 
                    alt="" style="z-index: -1; object-fit: cover;">
            </div>

            <!-- setter address display -->
            <div class="col-2 gradient-transparent-to-bg-gray-200 text-center py-5" style="z-index: 1000;">

                <img class="w-50 rounded-circle" 
                    :src="yourProfile.profileImagePath" alt="">

                <button class="btn bg-xpress-purple-100 mt-4
                    bg-hover-xpress-to-gray-200
                    rounded text-light p-1 roboto
                    fs-xpress-sm-200 fw-xpress-500"
                    @click.prevent="setProfileAddress($event)">
                    Set As Your Default or Previous Address
                </button>

            </div>

            <!-- address form -->
            <div class="col-10 gradient-transparent-to-bg-gray-200 py-5" style="z-index: 1000;">

                <div class="row">
                
                    <!-- your location warning notes -->
                    <div class="col-4">
                        <h6 class="roboto text-xpress-red-200 fs-xpress-sm-300">YOUR LOCATION</h6>
                        <p class="roboto text-light fs-xpress-sm-200 justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus deserunt quia aperiam sed id</p>
                    </div>

                    <!-- address lines -->
                    <div class="col-8">

                        <!-- addressLine1 -->
                        <div class="form-control p-0 rounded-0 border-0">
                            
                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="addressLine1">ADDRESS LINE 1</label>

                            <input class="roboto text-xpress-gray-100
                                bg-light border-0 py-1 fw-xpress-500 
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                type="text" name="addressLine1" 
                                v-model="shopInput.addressLine1" required>
                        </div>

                        <!-- addressLine2 -->
                        <div class="form-control p-0 rounded-0 border-0 mt-3">
                            
                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="addressLine2">ADDRESS LINE 2</label>

                            <input class="roboto text-xpress-gray-100 
                                bg-light border-0 py-1 fw-xpress-500 
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                type="text" name="addressLine2" 
                                v-model="shopInput.addressLine2" required>
                        </div>

                    </div>

                    <!-- city -->
                    <div class="col-3 mt-4">
                        <div class="form-control p-0 rounded-0 border-0">

                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="city">CITY</label>

                            <input class="roboto text-xpress-gray-100 
                                bg-light border-0 py-1 fw-xpress-500
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                type="text" name="city" 
                                v-model="shopInput.city" required>
                        </div>
                    </div>

                    <!-- state -->
                    <div class="col-3 mt-4">
                        <div class="form-control p-0 rounded-0 border-0">

                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="state">STATE</label>

                            <input class="roboto text-xpress-gray-100 
                                bg-light border-0 py-1 fw-xpress-500
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                type="text" name="state" 
                                v-model="shopInput.state" required>
                        </div>
                    </div>

                    <!-- postalCode -->
                    <div class="col-3 mt-4">
                        <div class="form-control p-0 rounded-0 border-0">

                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="postalCode">POSTAL CODE</label>

                            <input class="roboto text-xpress-gray-100 
                                bg-light border-0 py-1 fw-xpress-500
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2"
                                type="text" name="postalCode" 
                                v-model="shopInput.postalCode" required>
                        </div>
                    </div>

                    <!-- country -->
                    <div class="col-3 mt-4">
                        <div class="form-control p-0 rounded-0 border-0">

                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="country">COUNTRY</label>

                            <input class="roboto text-xpress-gray-100 
                                bg-light border-0 py-1 fw-xpress-500
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
                                type="text" name="country" 
                                v-model="shopInput.country" required>
                        </div>
                    </div>
                
                    <!-- delivery policy notes -->
                    <div class="col-4 mt-4">
                        <h6 class="roboto text-xpress-blue-100 fs-xpress-sm-300">DELIVERY POLICY</h6>
                        <p class="roboto text-light fs-xpress-sm-200 justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus deserunt quia aperiam sed id</p>
                    </div>

                    <div class="col-8 mt-4">

                        <!-- comment -->
                        <div class="form-control p-0 rounded-0 border-0">

                            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                                for="country">COMMENT</label>

                            <textarea class="roboto text-xpress-gray-100 
                                bg-light border-0 py-2 fw-xpress-500 
                                fs-xpress-sm-300 rounded w-100 mt-1 px-2"
                                name="comment" style="height: 100px;" 
                                v-model="shopInput.comment">
                            </textarea>
                            
                        </div>

                    </div>

                    <div class="col-4 mt-4">

                        <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                            for="country">EXPECTED DURATION ON DELIVERY</label>
                    </div>

                    <div class="col-5 mt-4">

                        <label class="roboto text-light fs-xpress-sm-300 fw-xpress-500" 
                            for="country">24 HOURS</label>
                    </div>

                </div>

            </div>

        </div>

    </div>
</template>

<script setup>
    import { inject } from 'vue';

    const setProfileAddress = inject('setProfileAddress');
    const shopInput = inject('shopInput');
    const yourProfile = inject('yourProfile');
    const isHired = inject('isHired');

</script>

<style lang="scss" scoped>

</style>