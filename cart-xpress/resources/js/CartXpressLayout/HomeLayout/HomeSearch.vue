<template>
    <!-------------------------------- Search Section START -->
    <div class="search-home-xpress container-fluid 
                bg-xpress-gray-100 text-center px-5 
                d-flex flex-column justify-content-center align-items-center 
                border-bottom border-2 py-4">

        <h6 class="text-light roboto fw-xpress-400 mt-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>

        <!-- search inputs -->
        <div class="row w-100 px-5 my-4">
            <div class="col-4">
                <div class="form-control border border-0 p-0">

                    <img src="/images/icons/input-icon-1.png" alt="" style="width: 4.5em">
                    <input class="border rounded-pill 
                                  w-100 pe-3 py-1" 
                           type="search" style="padding-left: 3.25rem" 
                           placeholder="search product...">
                </div>
            </div>
            <div class="col-4">

                <div class="form-control border border-0 p-0">
                    <img src="/images/icons/input-icon-2.png" alt="" style="width: 3.75em">
                    <input class="border rounded-pill 
                                  w-100 pe-3 py-1"
                           type="search" style="padding-left: 3.25rem" 
                           placeholder="search shop...">
                </div>
            </div>
            <div class="col-4">
                <div class="form-control border border-0 p-0">

                    <img src="/images/icons/input-icon-3.png" alt="" style="width: 3.5em">
                    <input class="border rounded-pill 
                                  w-100 pe-3 py-1" 
                           type="number" style="padding-left: 3.25rem"
                            placeholder="price afford...">
                </div>
            </div>
        </div>

        <p class="text-light roboto w-75 my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                               Expedita deleniti, consectetur maiores voluptates id beatae 
                                               reiciendis, est sed assumenda dignissimos atque possimus ipsum? 
                                               Harum minima veniam dolore, inventore beatae adipisci.</p>

        <!-- search button -->
        <button class="btn bg-primary bg-xpress-purple-100 
                      bg-hover-xpress-to-gray-200 text-light 
                      nato-sans-jp rounded-pill mt-4 mb-3 px-5 py-1">

            <i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
    </div>
    <!---------- Search Section END -->
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>