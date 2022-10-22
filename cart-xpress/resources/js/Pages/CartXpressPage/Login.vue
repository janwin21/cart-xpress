<template>

    <CartXpressAppLayout>

        <CoverLayout>

            <!-- box space -->
            <div class="w-100" style="height: 50px;"></div>

            <!-------------------------------- Cart Xpress Login Main START -->
            <div class="login position-relative container">

                <div class="row" style="height: 500px;">

                    <LeftLogin />

                    <RightLogin />

                </div>

            </div>
        
        </CoverLayout>

        <!-- display no footer -->
        <template #footer>''</template>

    </CartXpressAppLayout>

</template>

<script setup>
    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import CoverLayout from '../../CartXpressLayout/LoginLayout/CoverLayout.vue';
    import LeftLogin from '../../CartXpressLayout/LoginLayout//LeftLogin.vue';
    import RightLogin from '../../CartXpressLayout/LoginLayout//RightLogin.vue';

</script>

<style lang="scss" scoped>

</style>