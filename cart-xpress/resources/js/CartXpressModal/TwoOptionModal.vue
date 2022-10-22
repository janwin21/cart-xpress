<template>
    <!-------------------------------- One Way Option Modal START -->
    <div class="cart-xpress-modal-wrapper bg-opaque-xpress-black-300
                position-fixed top-0 left-0 w-100 p-5
                d-flex justify-content-center align-items-center"
                style="z-index: 2000; height: 100vh; overflow-y: auto;">

        <!-- modal container -->
        <div class="cart-xpress-modal position-relative w-50">

            <!-- welcome header -->
            <div :class="`welcome-header w-100
                    border border-top-0 border-start-0 
                    border-end-0 border-bottom-${(props.color) ? props.color : 'red-100'}
                    text-center text-light px-5 pt-4 pb-1
                    bg-xpress-gray-200`">
    
                <button class="btn bg-xpress-gray-400
                    bg-hover-xpress-to-gray-200 text-light
                    rounded-pill fs-xpress-sm-100 
                    fw-xpress-600 m-2
                    position-absolute top-0 end-0"
                    id="background-btn"
                    @click="showTwoWayOptionPopup()">
                    <i class="fa fa-remove"></i>
                    </button>
                        
                <h4 :class="`roboto text-xpress-${
                        (props.color) ? props.color : 'red-100'
                    } fs-xpress-sm-500 mb-1`">
                    <slot name="modal-header" />
                </h4>

                <p class="roboto mt-0 fs-xpress-sm-200">ECCOMERCE TITLE</p>
            </div>

            <!-- modal content -->
            <div class="modal-content bg-xpress-gray-200 text-light justify w-100 px-5 pb-4">  

                <!-- paragraph only -->
                <div class="single-paragraph-only mt-4">
    
                    <p class="roboto fs-xpress-sm-200">
                        <slot name="modal-body" />
                    </p>
                </div>

                <div class="lower-buttons mt-4 d-flex justify-content-end">

                    <slot name="modal-buttons" />

                </div>
                
            </div>

        </div>

    </div>
    <!---------- One Way Option Modal END -->
</template>

<script setup>
    import { inject } from 'vue';

    const showTwoWayOptionPopup = inject('showTwoWayOptionPopup');

    const props = defineProps({
        color: String
    });
 
</script>

<style lang="scss" scoped>

</style>