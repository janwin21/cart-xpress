<template>                       
    <!-- other address content -->
    <div class="col-2 ps-0">
                
        <!-- other address notes -->
        <h6 class="roboto text-xpress-orange-200 
                fs-xpress-sm-300">OTHER ADDRESS</h6>

        <p class="roboto text-light fs-xpress-sm-200 justify">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Natus deserunt quia aperiam sed id</p>
                
        <!-- other address notes -->
        <h6 class="roboto text-xpress-gray-300 mt-5
            fs-xpress-sm-300">SEARCH COLLEAGUES</h6>

        <!-- search customer inputs -->
        <input class="roboto text-xpress-gray-100 
            bg-light border-0 py-1 fw-xpress-500
            fs-xpress-sm-300 rounded w-100 mt-1 px-2" 
            v-model="searchCustomerValue"
            type="search" 
            name="search">

        <div class="row row-cols-4 g-1 mt-2">

            <template v-for="user in 
                filterItems(searchCustomerValue, props.users)" 
                :key="user.id">

                <div class="col">
                    <a href="#" @click="setDefaultAddress($event)" :data-id="user.id">
                        <img class="rounded-circle w-100" 
                            :src="user.profileImagePath"
                            style="height: 48px" 
                            alt="profile image">
                    </a>
                </div>

            </template>

        </div>

    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/inertia-vue3';
    import { ref, watch, inject } from 'vue';

    import { dynamicFilter } from '../../Composables/DynamicFilter';
    const { filterItems } = dynamicFilter('firstName');

    const props = defineProps({
        users: Array
    });

    // SEARCH
    const searchCustomerValue = ref('');
    const setDefaultAddress = inject('setDefaultAddress');
    watch(searchCustomerValue, value => { searchCustomerValue.value = value; });

</script>

<style lang="scss" scoped>

</style>