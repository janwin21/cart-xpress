<template>
    <!-- empty items -->
    <div v-if="length <= 0" class="empty-section m-3 p-3 
                border border-1 text-center rounded"
                style="display: none;">

        <h5 class="d-inline roboto text-light fw-xpress-500
                   mb-1 fs-xpress-sm-300 w-50 text-end">
                   <i class="fa-solid fa-face-sad-cry fs-xpress-sm-600 me-2"></i>
                   THIS SECTION IS EMPTY</h5>

    </div>
</template>

<script setup>
    const props = defineProps({
        length: Number
    });
</script>

<style lang="scss" scoped>

</style>