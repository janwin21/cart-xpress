<template>
    <div>
        <Nav />

        <slot />

        <slot name="footer">  
            <Footer />
        </slot>
    </div>
</template>

<script setup>
    // main components
    import Nav from '../CartXpressLayout/Components/Nav.vue'
    import Footer from '../CartXpressLayout/Components/Footer.vue';

</script>

<style lang="scss" scoped>

</style>