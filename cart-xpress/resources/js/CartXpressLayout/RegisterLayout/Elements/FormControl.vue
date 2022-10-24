<template>
    <!-- form control -->
    <div :class="`col-${col ? col : 4}`">
        <div class="form-control p-0 rounded-0 border-0">

            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                :for="inputName">{{ labelName }} 
                <span v-if="required" 
                      class="text-xpress-red-200 roboto fw-xpress-900">*</span>
            </label>

            <slot />

        </div>
    </div>
</template>

<script setup>
    const props = defineProps({
        col: String,
        labelName: String,
        type: String,
        inputName: String,
        required: Boolean,
    });
</script>

<style lang="scss" scoped>

</style>