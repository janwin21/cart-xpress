<template>  
    <!--------------------------------Review Content START -->  
    <div class="review-content bg-xpress-gray-200 rounded-top mt-4">

        <!-- review header -->
        <div class="review-header pt-4 px-4 pb-1 rounded-top bg-xpress-purple-300">

            <h5 class="roboto mb-0 text-light 
                        fs-xpress-sm-600">
                        Product Review</h5>

            <p class="roboto mt-0
                        fs-xpress-sm-300 fw-xpress-400 
                        text-xpress-yellow-100">
                        RATING {{ props.product.overallRating }}</p>

        </div>
    
        <!-- sorted components -->
        <div class="sorted-component-wrapper row p-4 border-bottom-gray-300 m-0">
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
                                    fs-xpress-sm-200 fw-xpress-500 me-1"
                                    @click="dynamicSortBy(
                                            [props.product], 'reviews', 
                                            property = 'content', orderedThrough)">
                                    Content</button>
        
                        <button class="btn bg-xpress-purple-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 me-1"
                                    @click="dynamicSortBy(
                                            [props.product], 'reviews', 
                                            property = 'postedAt', orderedThrough)">
                                    Recent</button>
        
                        <button class="btn bg-xpress-purple-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 me-1"
                                    @click="dynamicSortBy(
                                            [props.product], 'reviews', 
                                            property = 'rating', orderedThrough)">
                                    Ratings</button>
                    </div>
                </div>

            </div>
            <div class="col-6 text-end">

                <p class="roboto fs-xpress-sm-200 
                        fw-xpress-700 text-light mb-1" style="visibility: hidden">Sorted By:</p>

                <!-- sorted components for right -->
                <div class="sorted-component">
                    <div class="sorted-buttons mt-0">
        
                        <button class="btn bg-xpress-red-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 ms-1"
                                    @click="dynamicSortBy(
                                        [props.product], 'reviews', 
                                        property, orderedThrough = 'asc')">
                                    ASC</button>
        
                        <button class="btn bg-xpress-green-100
                                    bg-hover-xpress-to-gray-200
                                    rounded text-light py-1 px-4 roboto
                                    fs-xpress-sm-200 fw-xpress-500 ms-1"
                                    @click="dynamicSortBy(
                                        [props.product], 'reviews', 
                                        property, orderedThrough = 'desc')">
                                    DESC</button>
                    </div>
                </div>
            
            </div>
        </div>

        <!-- review content -->
        <div class="review-main-content p-4">

            <div class="create-review bg-xpress-gray-100 rounded p-4">

                <form @submit.prevent="reviewForm.post(route('reviews.store'))">

                    <h4 class="roboto mb-0 text-light 
                        fs-xpress-sm-400">
                        Please review our product</h4>

                    <p class="d-inline roboto mt-3
                        fs-xpress-sm-300 fw-xpress-500 
                        text-xpress-gray-600">
                        RATE US</p>

                    <!-- rating-->
                    <input class="d-inline roboto mt-3 text-xpress-gray-100
                        bg-light border-0 px-2 ms-2 fw-xpress-500 
                        fs-xpress-sm-300 rounded-0" 
                        type="number" min="1"
                        name="rating" style="width: 4em"
                        v-model="reviewForm.rating">

                    <!-- content -->
                    <div class="form-control mt-4 p-0 rounded-0 border-0">

                        <textarea class="roboto text-xpress-gray-300 
                            bg-xpress-gray-500 border-0 py-2 fw-xpress-500 
                            fs-xpress-sm-300 rounded w-100 mt-1 px-3"
                            name="content" placeholder="type your review here..."
                            style="height: 100px;" v-model="reviewForm.content">
                        </textarea>
                    
                    </div>

                    <div class="lower-part w-100 mt-3">

                        <button class="btn bg-xpress-purple-300 
                            bg-hover-xpress-to-gray-200 text-light 
                            rounded py-1 px-5 fs-xpress-sm-300 
                            fw-xpress-500 me-1"
                            type="submit">
                            Publish
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/inertia-vue3';
    import { inject } from 'vue';

    const props = defineProps({
        product: Object
    });

    const reviewForm = useForm({
        productID: 0,
        rating: 5,
        content: 'Good product!'
    });

    reviewForm.productID = props.product.id;

    const property = inject('property');
    const orderedThrough = inject('orderedThrough');
    const dynamicSortBy = inject('dynamicSortBy');

</script>

<style lang="scss" scoped>

</style>