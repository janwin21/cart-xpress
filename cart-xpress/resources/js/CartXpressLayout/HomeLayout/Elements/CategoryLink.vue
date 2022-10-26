<template>
    <div class="category-item 
                col p-0 bg-primary">

        <img class="w-100 h-100" 
             :src="props.backgroundImagePath" alt="category image">

        <Link :href="route('categories.show', props.categoryID)">
            <p class="bg-opaque-xpress-black-200
                      bg-opaque-hover-xpress-to-black-100 
                      roboto text-light text-center bg-primary
                      w-100 h-100 m-0 
                      d-flex justify-content-center align-items-center 
                      fs-xpress-sm-200">
                      {{ props.name.toUpperCase() }}</p>
        </Link>
    </div>
</template>

<script setup inherit-attrs="false">
    import { Link } from '@inertiajs/inertia-vue3';

    const props = defineProps({
        categoryID: Number,
        name: String,
        backgroundImagePath: String
    });

</script>

<style lang="scss" scoped>

</style>