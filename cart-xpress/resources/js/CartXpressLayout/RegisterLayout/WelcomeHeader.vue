<template>
    <!-- welcome header -->
    <div class="welcome-header 
                border border-top-0 border-start-0 
                border-end-0 border-bottom-1 
                text-center px-5 pt-5 pb-4">
                
        <h4 class="roboto text-xpress-blue-300">
            <slot name="header" /></h4>

        <p class="roboto text-light mt-3">
            <slot name="paragraph" /></p>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>