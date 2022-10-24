<template>
    <!-- assigning employee -->
    <div class="col-6 mb-3">

        <!-- select -->
        <div class="form-control p-0 rounded-0 border-0 mt-2">

            <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                for="select">{{ props.upperText }}</label>

            <input class="roboto text-light 
                bg-xpress-gray-500 border-0 py-1 fw-xpress-500
                fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                name="select" v-model="selectedUser" 
                :placeholder="`select ${props.placeHolderText} below...`" readonly>
        </div>

        <!-- employee selection container -->
        <div class="employee-selection-box rounded 
                    bg-xpress-gray-200 mt-2">

            <!-- sorted components for right -->
            <div class="sorted-component w-100 p-2 border-bottom-blue-200">

                <p class="roboto fs-xpress-sm-200 
                            fw-xpress-700 text-light mb-1">
                            Sorted By:</p>

                <div class="sorted-buttons">

                    <div class="row m-0 g-1">
                        <div class="col-3">
    
                            <button class="btn bg-xpress-purple-100 w-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 mt-1"
                                            @click="dynamicSortBy(
                                                [{ users: props.users }], 'users', 
                                                property = 'lastName', orderedThrough)">
                                            Alphabet</button>
                        </div>
                        
                        <div class="col-3">
    
                            <button class="btn bg-xpress-purple-100 w-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 mt-1"
                                            @click="dynamicSortBy(
                                                [{ users: props.users }], 'users', 
                                                property = 'createdAt', orderedThrough)">
                                            Recent</button>
                        </div>
                        
                        <div class="col-3">
    
                            <button class="btn bg-xpress-red-100 w-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 mt-1"
                                            @click="dynamicSortBy(
                                                [{ users: props.users }], 'users', 
                                                property, orderedThrough = 'asc')">
                                            ASC</button>
                        </div>
                        
                        <div class="col-3">
    
                            <button class="btn bg-xpress-green-100 w-100
                                            bg-hover-xpress-to-gray-200
                                            rounded text-light py-1 px-4 roboto
                                            fs-xpress-sm-200 fw-xpress-500 mt-1"
                                            @click="dynamicSortBy(
                                                [{ users: props.users }], 'users', 
                                                property, orderedThrough = 'desc')">
                                            DESC</button>
                        </div>

                    </div>

                </div>
            </div>

            <!-- search employee -->
            <div class="form-control p-0 rounded-0 border-0 p-2">

                <label class="roboto text-xpress-gray-300 fs-xpress-sm-300 fw-xpress-500" 
                    for="select">SEARCH EMPLOYEE</label>

                <input class="roboto text-light 
                    bg-xpress-gray-500 border-0 py-1 fw-xpress-500
                    fs-xpress-sm-300 rounded w-100 mt-1 px-2" type="text" 
                    name="select" :placeholder="`search ${props.placeHolderText} here...`"
                    v-model="searchProductValue" />
            </div>

            <p class="roboto text-light fs-xpress-sm-300 p-2 mb-0">
                <span class="text-xpress-blue-200">firstName lastName</span> 
                was selected</p>

            <div class="row row-cols-3 p-2 g-1">

                <template v-for="user in filterItems(searchProductValue, props.users)" :key="user.id">
                    
                    <!-- user item -->
                    <div class="col">

                        <a href="#" @click.prevent="selectUser"
                            :data-id="user.id"
                            :data-first-name="user.firstName"
                            :data-last-name="user.lastName">

                            <div class="user-box position-relative" 
                                    style="height: 200px;">

                                <!-- cover -->
                                <div class="position-absolute 
                                    top-0 left-0 w-100 h-100">

                                    <img class="w-100 h-100" 
                                        :src="user.backgroundImagePath" alt="" 
                                        style="object-fit: cover;">
                                </div>

                                <div class="position-absolute 
                                    top-0 left-0 w-100 h-100
                                    d-flex flex-column
                                    justify-content-center
                                    align-items-center
                                    gradient-transparent-to-bg-gray-100">
                                
                                <img class="border border-3 
                                            rounded-circle" 
                                    :src="user.profileImagePath" alt="" 
                                    style="width: 35%; object-fit: cover;">

                                <h4 class="roboto text-light 
                                        mt-3 mb-0 fs-xpress-sm-400">
                                        {{ user.lastName }}</h4>

                                <h4 class="roboto text-light 
                                        my-0 fs-xpress-sm-300">
                                        {{ user.firstName }}</h4>
                                </div>

                            </div>
                            
                        </a>

                    </div>

                </template>

            </div>

        </div>
    </div>
</template>

<script setup>
    import { ref, watch } from 'vue';
    import { dynamicSort } from '../../../Composables/DynamicSort';
    import { dynamicFilter } from '../../../Composables/DynamicFilter';

    const props = defineProps({
        upperText: String,
        placeHolderText: String,
        users: Array,
        captureID: Object
    });

    let selectedUser = ref('');
    const { property, orderedThrough, dynamicSortBy } = dynamicSort();
    const { filterItems } = dynamicFilter('lastName');

    function selectUser(event) {
        const { id, firstName, lastName } = event.currentTarget.dataset;
        selectedUser.value = firstName + ' ' + lastName;

        if(props.placeHolderText === 'employee')
            props.captureID.employeeID = parseInt(id);
        else 
            props.captureID.customerID = parseInt(id);
    }

    // SEARCH
    const searchProductValue = ref('');
    watch(searchProductValue, value => { searchProductValue.value = value; });

</script>

<style lang="scss" scoped>

</style>