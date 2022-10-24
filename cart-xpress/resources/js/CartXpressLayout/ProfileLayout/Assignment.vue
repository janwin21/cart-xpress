<template>
    <!-- assigned employee containers -->
    <div class="shopping-cart-row mt-4">
    
    <button class="dropdown-btn btn bg-xpress-blue-100 w-25
        bg-hover-xpress-to-gray-200 text-end
        rounded-0 text-light py-1 ps-4 roboto
        fs-xpress-sm-300 fw-xpress-500">
        ASSIGN EMPLOYEES</button>

    <div class="order-wrapper mt-3">

        <div class="pb-0 text-end">
            
            <button class="btn bg-xpress-orange-200 w-25
                bg-hover-xpress-to-gray-200
                rounded-0 text-light py-1 px-4 roboto
                fs-xpress-sm-200 fw-xpress-500 mt-1"
                @click="assign">
                Confirm</button>
        </div>

        <div class="row m-0 gx-2 px-3">

            <SelectCard upper-text="SELECT EMPLOYEE"
                        place-holder-text="employee"
                        :users="employees"
                        :captureID="captureID" />

            <SelectCard upper-text="SELECT UNASSIGN CUSTOMER"
                        place-holder-text="customer"
                        :users="needToAssignCustomers"
                        :captureID="captureID" />

        </div>
        
    </div>

</div>
</template>

<script setup>
    import SelectCard from './Elements/SelectCard.vue';
    import { reactive, inject } from 'vue';
    import { Inertia } from '@inertiajs/inertia';

    const employees = inject('employees');
    const needToAssignCustomers = inject('needToAssignCustomers');

    const captureID = reactive({
        employeeID: -1,
        customerID: -1
    });

    function assign() {
        if(captureID.employeeID >= 0 && captureID.customerID >= 0) {
            Inertia.post(route('employees.assign', captureID));
        }
    }

</script>

<style lang="scss" scoped>

</style>