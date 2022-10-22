<template>

    <Link class="nav-item nav-link align-self-center
          text-light nato-sans-jp 
          fs-xpress-sm-300 ms-3
          text-hover-xpress-to-red-100">

        <slot />

    </Link>
    
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
</script>

<style lang="scss" scoped>

</style>