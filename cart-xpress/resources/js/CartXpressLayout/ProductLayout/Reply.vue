<template>
    <!-- single reply item -->
    <div class="single-review-content p-4 border-bottom-gray-300">
        <div class="row m-0">

            <!-- left -->
            <div class="col-1 p-0 me-0 pe-3 text-end">
                <img class="rounded-circle" 
                    :src="props.reply.createdBy.imagePath" alt="" 
                    style="height: 50px;">   
            </div>

            <!-- right -->
            <div class="col-11 ms-0">

                <h4 class="d-inline roboto text-light mt-4 me-1
                            mb-1 fs-xpress-sm-400 fw-xpress-400 w-50">
                            {{ props.reply.createdBy.firstName }} 
                            {{ props.reply.createdBy.lastName }}</h4>

                <p class="d-inline roboto mt-0
                            fs-xpress-sm-200 fw-xpress-500 
                            text-xpress-gray-600">
                            reply at {{ moment(props.reply.replyAt)
                                            .format('MMMM Do YYYY, h:mm:ss a') }}</p>

                <button class="float-end btn bg-xpress-red-100 
                                bg-hover-xpress-to-gray-200 text-light 
                                rounded py-1 px-5 fs-xpress-sm-300 
                                fw-xpress-500 me-1">
                                Delete</button>

                <p class="roboto my-0 w-100
                            fs-xpress-sm-300 fw-xpress-400 
                            text-light">{{ props.reply.content }}</p>

            </div>

        </div>

    </div>
</template>

<script setup>
    import moment from 'moment';

    const props = defineProps({
        reply: Object
    });

</script>

<style lang="scss" scoped>

</style>