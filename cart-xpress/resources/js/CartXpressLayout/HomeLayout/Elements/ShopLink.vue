<template>
    <Link href="#" :id="props.id">
        <img v-bind="$attrs"
             :src="props.backgroundImagePath" 
             alt="shop image">
    </Link>
</template>

<script setup inherit-attrs="false">
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        id: Number,
        backgroundImagePath: String
    });

</script>

<style lang="scss" scoped>

</style>