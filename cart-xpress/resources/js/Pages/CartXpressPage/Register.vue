<template>

    <CartXpressAppLayout>

        <RegisterCover>

            <!-------------------------------- Cart Xpress Register Main START -->
            <div class="register">

                <div class="row">

                    <div class="col-9 bg-xpress-gray-100 p-0 pb-5">

                        <!-- customer component -->
                        <div class="customer-component">

                            <WelcomeHeader>

                                <template #header>New Guest</template>

                                <template #paragraph>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                    Ab, officiis velit? Molestiae id dolorum, 
                                    soluta similique fuga nobis quisquam.
                                </template>

                            </WelcomeHeader>

                            <CustomerForm />
                            
                        </div>

                        <!-- employee component -->
                        <div class="employee-component" style="display: none;">

                            <WelcomeHeader>

                                <template #header>New Employee</template>

                                <template #paragraph>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                                    Ab, officiis velit? Molestiae id dolorum, 
                                    soluta similique fuga nobis quisquam.
                                </template>

                            </WelcomeHeader>

                            <EmployeeForm />
                            
                        </div>
                                
                    </div>

                    <SelectForm />

                </div>

            </div>
            <!---------- Cart Xpress Register Main END -->

        </RegisterCover>

    </CartXpressAppLayout>

</template>

<script setup>
    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import RegisterCover from '../../CartXpressLayout/Components/RegisterLayout/RegisterCover.vue';
    import WelcomeHeader from '../../CartXpressLayout/Components/RegisterLayout/WelcomeHeader.vue';
    import CustomerForm from '../../CartXpressLayout/Components/RegisterLayout/CustomerForm.vue';
    import EmployeeForm from '../../CartXpressLayout/Components/RegisterLayout/EmployeeForm.vue';
    import SelectForm from '../../CartXpressLayout/Components/RegisterLayout/SelectForm.vue';

    // actions & composables
    import callRegister from '../../Actions/register';

    callRegister();

</script>

<style lang="scss" scoped>

</style>