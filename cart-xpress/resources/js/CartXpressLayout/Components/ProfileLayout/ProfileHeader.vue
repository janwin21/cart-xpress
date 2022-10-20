<template>
    <!-- main profile header -->
    <div class="main-profile gradient-transparent-to-bg-gray-100 
                position-relative w-100">

        <!-- main profile background -->
        <div class="position-absolute top-0 start-0 w-100" style="z-index: -1">
            <img class="w-100 h-100" src="/images/alphabetical-backgrounds/a-profile-background.jpg" alt="">
        </div>

        <div class="w-100 d-flex flex-column 
                    justify-content-center align-items-center pt-5">

            <!-- profile image -->
            <div class="w-25 d-flex justify-content-center">
                
                <img class="rounded-circle w-50 
                            border border-3 border-light" 
                            src="/images/alphabetical-profile/a-profile.jpg" alt="">
            </div>

            <!-- first details -->
            <h5 class="d-inline roboto text-light 
                        mt-3 mb-0 fs-xpress-sm-500">
                        firstName lastName</h5>

            <h5 class="d-inline roboto mt-0 
                        fs-xpress-sm-400 fw-xpress-400
                        px-3 py-1 text-light">
                        email@gmail.com</h5>

            <div class="w-100 text-end border-bottom-blue-200 px-3 pb-3">
    
                <button class="btn bg-xpress-orange-200
                                bg-hover-xpress-to-gray-200
                                rounded text-light py-1 px-4 roboto
                                fs-xpress-sm-200 fw-xpress-500">
                                EDIT</button>
    
                <button class="btn bg-xpress-purple-100 ms-1
                                bg-hover-xpress-to-gray-200
                                rounded text-light py-1 px-4 roboto
                                fs-xpress-sm-200 fw-xpress-500">
                                MESSAGE</button>
            </div>

            <!-- address details -->
            <div class="row row-cols-2 w-100 p-3">

                <div class="col">

                    <h5 class="d-inline roboto mt-0 
                                fs-xpress-sm-400 fw-xpress-400
                                py-1 text-light">
                                addressLine1</h5>

                </div>

                <div class="col">

                    <h5 class="d-inline roboto mt-0 
                                fs-xpress-sm-400 fw-xpress-400
                                py-1 text-light">
                                addressLine2</h5>

                </div>

                <div class="col mt-2">

                    <h5 class="d-inline roboto mt-0 
                                fs-xpress-sm-400 fw-xpress-400
                                py-1 text-light">
                                phone no: phone</h5>

                </div>

                <div class="col mt-2">

                    <div class="row row-cols-4">

                        <div class="col">

                            <h5 class="d-inline roboto mt-0 
                                        fs-xpress-sm-300 fw-xpress-400
                                        py-1 text-light">
                                        city</h5>

                        </div>

                        <div class="col">

                            <h5 class="d-inline roboto mt-0 
                                        fs-xpress-sm-300 fw-xpress-400
                                        py-1 text-light">
                                        states</h5>

                        </div>

                        <div class="col">

                            <h5 class="d-inline roboto mt-0 
                                        fs-xpress-sm-300 fw-xpress-400
                                        py-1 text-light">
                                        country</h5>

                        </div>

                        <div class="col">

                            <h5 class="d-inline roboto mt-0 
                                        fs-xpress-sm-300 fw-xpress-400
                                        py-1 text-light">
                                        postalCode</h5>

                        </div>

                    </div>

                </div>

            </div>
            
        </div>

    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>