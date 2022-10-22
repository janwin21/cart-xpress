<template>
    <!-- header content -->
    <div class="row">
        <div class="col-7 p-0 pe-2">

            <ShopLink class="w-100 h-100" :id="shops[0].id"
                :backgroundImagePath="shops[0].backgroundImagePath" />
        </div>
        <div class="col-5 p-0">

            <ShopLink class="w-100 h-50 pb-2" :id="shops[1].id"
                :backgroundImagePath="shops[1].backgroundImagePath" />

            <div class="row h-50 ps-2">
                <div class="col-6 p-0 ps-1 pe-2">

                    <ShopLink class="w-100 h-100" :id="shops[2].id"
                        :backgroundImagePath="shops[2].backgroundImagePath" />
                </div>
                <div class="col-6 p-0 pe-2">

                    <ShopLink class="w-100 h-100 pe-1" :id="shops[3].id"
                        :backgroundImagePath="shops[3].backgroundImagePath" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import ShopLink from '../Elements/ShopLink.vue';
    import { inject } from 'vue';

    const shops = inject('popularShops');
</script>

<style lang="scss" scoped>

</style>