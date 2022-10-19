<template> 
    <!-------------------------------- Search Manager Section START -->
    <div class="search-manager container-fluid bg-xpress-gray-100 p-4 pb-0">

        <!--  search components -->
        <div class="search-component-wrapper row">
            <div class="col-6">

                <div class="form-control border border-0 p-0 
                            d-flex align-items-center">


                    <a href="#category-footer">
                        <img src="/images/icons/search-icon-2.png" alt="" style="width: 2.1em">
                        <input class="border rounded-pill pe-3 py-1"
                            type="search" style="padding-left: 2.75rem" 
                            placeholder="search product...">
                    </a>

                    <!-- show cart button -->
                    <button class="btn bg-xpress-orange-200 
                                   bg-hover-xpress-to-gray-200 
                                   rounded text-light py-1 px-4 
                                   fs-xpress-sm-200 fw-xpress-500 ms-2"
                            id="show-cart-btn">
                                   Show Cart</button>
                </div>

            </div>
            <div class="col-6 text-end">

                <div class="application-description-header 
                            d-flex justify-content-end align-items-center">

                    <button class="btn bg-xpress-red-100
                                   bg-hover-xpress-to-gray-200
                                   rounded text-light me-2 py-1 px-4 roboto
                                   fs-xpress-sm-100 fw-xpress-500"
                            id="hide-home-btn"
                            style="display: none;">
                                   HIDE</button>

                    <button class="btn bg-xpress-purple-100
                                   bg-hover-xpress-to-gray-200
                                   rounded text-light me-2 py-1 px-4 roboto
                                   fs-xpress-sm-100 fw-xpress-500"
                            id="show-home-btn">
                                   SHOW</button>

                    <h6 class="text-light nato-sans-jp 
                              fw-xpress-400">
                              Lorem ipsum dolor sit.</h6>
                </div>

                <p class="text-light roboto 
                          fs-xpress-sm-300 fw-xpress-300">
                          Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>

            </div>
        </div>
        
        <!-- sorted components -->
        <div class="sorted-component-wrapper row pb-4">
            <div class="col-6">

                <!-- sorted components for left -->
                <div class="sorted-component">

                    <p class="roboto fs-xpress-sm-200 
                              fw-xpress-700 text-light mb-1">
                              Sorted By:</p>

                    <div class="sorted-buttons mt-0">
        
                        <button class="btn bg-xpress-purple-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500 me-1">
                                       Alphabet</button>
        
                        <button class="btn bg-xpress-purple-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500 me-1">
                                       Recent</button>
        
                        <button class="btn bg-xpress-purple-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500 me-1">
                                       Popularity</button>
        
                        <button class="btn bg-xpress-purple-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500 me-1">
                                       Price</button>
        
                        <button class="btn bg-xpress-purple-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500">
                                       Ratings</button>
                    </div>
                </div>

            </div>
            <div class="col-6 text-end">
                <p class="roboto fs-xpress-sm-200 fw-xpress-700 text-light mb-1" style="visibility: hidden">Sorted By:</p>

                <!-- sorted components for right -->
                <div class="sorted-component">
                    <div class="sorted-buttons mt-0">
        
                        <button class="btn bg-xpress-red-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500 me-1">
                                       ASC</button>
        
                        <button class="btn bg-xpress-green-100
                                       bg-hover-xpress-to-gray-200
                                       rounded text-light py-1 px-4 roboto
                                       fs-xpress-sm-200 fw-xpress-500">
                                       DESC</button>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!---------- Search Manager END -->
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>