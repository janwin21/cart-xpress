<template>
    <!-------------------------------- Cart Xpress Employee Introduction START -->
    <div class="cart-xpress-emlpoyee-introduction w-100" style="display: none">

        <!-- main part -->
        <div class="main-box container-fluid bg-xpress-gray-100">

            <div class="main-box__content row">
                <slot name="upper-details" />

            </div>

        </div>
        <slot name="lower-details" />

        <!-- cart xpress application background -->
        <div class="cart-xpress-background w-100 h-100" 
             style="z-index: -1;">

            <div class="gradient-bg-gray-100-to-black-op-100-to-bg-gray-100
                        cover w-100 h-100"></div>
        </div>

    </div>
    <!---------- Cart Xpress Employee Introduction END -->
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>