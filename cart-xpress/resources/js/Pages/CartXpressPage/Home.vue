<template>

    <CartXpressAppLayout>

        <SimpleGreeting />

        <HomeSearch />

        <SearchManager />

        <HomeHeader />

        <HomeDetails />

        <EmployeeHeader />

        <EmployeeDetails>

            <template #upper-details>

                <LeftEmployeeDetails />
                <RightEmployeeDetails />

            </template>
            <template #lower-details>

                <ShopHeader />

            </template>

        </EmployeeDetails>

        <MainShop>

            <!-- product in cart -->
            <template #cart-sidebar>
                <CartSidebar />
            </template>
                    
            <!-- display popular shops -->
            <template #main-shop-header>
                <MainShopPopular />
            </template>

            <template #main-shop-popular>
                <!-- display popular products -->
                <MainProductPopular>

                    <!-- display categories -->
                    <template #main-shop-categories>
                        <MainShopCategories />
                    </template>

                </MainProductPopular>
            </template>

            <!-- display product inside category -->
            <template #main-categories>
                <MainCategories />
            </template>

            <!-- random products -->
            <template #right-sidebar>
                <RightSidebar />
            </template>

        </MainShop>
        
    </CartXpressAppLayout>

</template>

<script setup>
    import { ref, provide } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import SimpleGreeting from '../../CartXpressLayout/HomeLayout/SimpleGreeting.vue';
    import HomeSearch from '../../CartXpressLayout/HomeLayout/HomeSearch.vue';
    import SearchManager from '../../CartXpressLayout/HomeLayout/SearchManager.vue';
    import HomeHeader from '../../CartXpressLayout/HomeLayout/HomeHeader.vue';
    import HomeDetails from '../../CartXpressLayout/HomeLayout/HomeDetails.vue';
    import EmployeeHeader from '../../CartXpressLayout/HomeLayout/EmployeeHeader.vue';
    import EmployeeDetails from '../../CartXpressLayout/HomeLayout/EmployeeDetails.vue';
    import MainShop from '../../CartXpressLayout/HomeLayout/MainShop.vue';
    
    // sub components
    import LeftEmployeeDetails from '../../CartXpressLayout/HomeLayout/SubComponents/LeftEmployeeDetails.vue';
    import RightEmployeeDetails from '../../CartXpressLayout/HomeLayout/SubComponents/RightEmployeeDetails.vue';
    import ShopHeader from '../../CartXpressLayout/HomeLayout/SubComponents/ShopHeader.vue';
    import CartSidebar from '../../CartXpressLayout/HomeLayout/SubComponents/CartSidebar.vue';
    import RightSidebar from '../../CartXpressLayout/HomeLayout/SubComponents/RightSidebar.vue';
    import MainShopPopular from '../../CartXpressLayout/HomeLayout/SubComponents/MainShopPopular.vue';
    import MainProductPopular from '../../CartXpressLayout/HomeLayout/SubComponents/MainProductPopular.vue';
    import MainShopCategories from '../../CartXpressLayout/HomeLayout/SubComponents/MainShopCategories.vue';
    import MainCategories from '../../CartXpressLayout/HomeLayout/SubComponents/MainCategories.vue';

    // actions & composables
    import callHome from '../../Actions/home';
    import { data } from '../../Composables/Data';
    import { dynamicSort } from '../../Composables/DynamicSort';

    callHome();
    const { popularShops, categoriesWithProducts, productsInACart, productsInRandomCategory } = data();
    const { property, orderedThrough, dynamicSortBy } = dynamicSort();

    // provide global values to the conencted components
    // DYNAMIC SORTS
    provide('property', property);
    provide('orderedThrough', orderedThrough);
    provide('dynamicSortBy', dynamicSortBy);

    // DATA
    provide('popularShops', popularShops);
    provide('categoriesWithProducts', categoriesWithProducts);
    provide('productsInACart', productsInACart);
    provide('productsInRandomCategory', productsInRandomCategory);

    // SEARCH
    const searchProductValue = ref('');
    provide('searchProductValue', searchProductValue);
</script>

<style lang="scss">

</style>