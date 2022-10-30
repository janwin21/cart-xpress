<template>
    <!-- reviews -->
    <div class="reviews bg-xpress-gray-200 border-top-gray-300 m-0 p-0">

        <template v-for="review in props.reviews" :key="review.id">

            <!-- single review item -->
            <div class="single-review-content p-4 border-bottom-gray-300">
                <div class="row m-0">

                    <!-- left -->
                    <div class="col-1 p-0 me-0 pe-3 text-end">
                        <img class="rounded-circle" 
                            :src="review.createdBy.profileImagePath" 
                            alt="profile image" 
                            style="height: 50px;">   
                    </div>

                    <!-- right -->
                    <div class="col-11 ms-0">

                        <h4 class="d-inline roboto text-light mt-4 me-1
                                mb-1 fs-xpress-sm-400 fw-xpress-400 w-50">
                                {{ review.createdBy.firstName }} 
                                {{ review.createdBy.lastName }}</h4>

                        <p class="d-inline roboto mt-0
                                fs-xpress-sm-200 fw-xpress-500 
                                text-xpress-gray-600">
                                posted at {{ moment(review.postedAt)
                                                .format('MMMM Do YYYY, h:mm:ss a') }}</p>

                        <button v-if="review.owned" class="float-end btn bg-xpress-red-100 
                                bg-hover-xpress-to-gray-200 text-light 
                                rounded py-1 px-5 fs-xpress-sm-300 
                                fw-xpress-500 me-1"
                                @click="destroy(review.id)">
                                Delete</button>

                        <p class="roboto mt-0
                                fs-xpress-sm-200 fw-xpress-400 
                                text-xpress-yellow-200">
                                RATING {{ review.rating }}</p>

                        <p class="roboto mt-0 w-100
                                fs-xpress-sm-300 fw-xpress-400 
                                text-light">{{ review.content }}</p>
                            
                        <button class="btn no-bg-color text-start 
                                    bg-hover-xpress-to-gray-200 text-light 
                                    rounded p-0 fs-xpress-sm-300 
                                    fw-xpress-500 me-1"
                                    @click="showReplyBySlide($event)">Show Replies</button>

                        <!-- replies -->
                        <div class="replies col-12 mt-4 ms-0 bg-xpress-gray-100 rounded"
                             style="display: none;">
        
                            <!-- sorted components -->
                            <div class="sorted-component-wrapper row p-4 
                                        border-bottom-gray-300 m-0">
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
                                                                [review], 'replies', 
                                                                property = 'content', orderedThrough)">
                                                        Content</button>
                            
                                            <button class="btn bg-xpress-purple-100
                                                        bg-hover-xpress-to-gray-200
                                                        rounded text-light py-1 px-4 roboto
                                                        fs-xpress-sm-200 fw-xpress-500 me-1"
                                                        @click="dynamicSortBy(
                                                                [review], 'replies', 
                                                                property = 'replyAt', orderedThrough)">
                                                        Recent</button>

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
                                                        fs-xpress-sm-200 fw-xpress-500 ms-1"
                                                        @click="dynamicSortBy(
                                                            [review], 'replies', 
                                                            property, orderedThrough = 'asc')">
                                                        ASC</button>
                            
                                            <button class="btn bg-xpress-green-100
                                                        bg-hover-xpress-to-gray-200
                                                        rounded text-light py-1 px-4 roboto
                                                        fs-xpress-sm-200 fw-xpress-500 ms-1"
                                                        @click="dynamicSortBy(
                                                            [review], 'replies', 
                                                            property, orderedThrough = 'desc')">
                                                        DESC</button>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            
                            <template v-for="reply in review.replies" :key="reply.id">
                                <Reply :reply="reply" />
                            </template>

                            <!-- reply form -->
                            <div class="create-review bg-xpress-gray-100 rounded p-4">
            
                                <form @submit.prevent="reply(review.id, $event)">

                                    <!-- content -->
                                    <div class="form-control p-0 rounded-0 border-0">
            
                                        <textarea class="roboto text-xpress-gray-300 
                                            bg-xpress-gray-500 border-0 py-2 fw-xpress-500 
                                            fs-xpress-sm-300 rounded w-100 mt-1 px-3"
                                            name="content" placeholder="type your review here..."
                                            style="height: 100px;" required="true" />

                                    </div>
            
                                    <div class="lower-part w-100 mt-3">

                                        <button class="btn bg-xpress-orange-100 
                                            bg-hover-xpress-to-gray-200 text-light 
                                            rounded py-1 px-5 fs-xpress-sm-300 
                                            fw-xpress-500 me-1"
                                            type="submit">
                                            Reply
                                        </button>

                                    </div>

                                </form>
            
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </template>

    </div>
    <!----------Review Content END -->
</template>

<script setup>
    import moment from 'moment';
    import $ from 'jquery';
    import { inject } from 'vue';
    import Reply from './Reply.vue';
    import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

    function showReplyBySlide(event) {
        const target = $(event.target);
        target.next().slideToggle(250)

        target.text(
            (target.text() === 'Show Replies') ?
                'Hide Replies' : 'Show Replies'
        );
    }

    const props = defineProps({
        reviews: Object
    });

    const property = inject('property');
    const orderedThrough = inject('orderedThrough');
    const dynamicSortBy = inject('dynamicSortBy');

    const replyForm = useForm({
        reviewID: 0,
        content: ''
    });

    function reply(reviewID, event) {
        replyForm.reviewID = reviewID;
        replyForm.content = $(event.currentTarget).find('textarea').val();
        replyForm.post(route('replies.store'));
        location.reload();
    }

    function destroy(reviewID) {
        Inertia.delete(route('reviews.destroy', reviewID));
    }

</script>

<style lang="scss" scoped>

</style>