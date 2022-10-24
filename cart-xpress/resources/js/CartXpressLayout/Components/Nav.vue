<template>
    <!-------------------------------- Navbar Section START -->
    <nav class="navbar navbar-expand-lg 
                container-fluid bg-xpress-gray-100 
                px-4 py-1 m-0 sticky-top"
                style="height: 50px;">

        <!-- nav-title -->
        <a class="navbar-brand text-light roboto" href="#">
            <img src="/images/logos/logo-title.png" alt="" style="width: 1.75em;">
            <span class="text-hover-xpress-to-purple-200 ms-2">
                cartXpress</span></a>

        <!-- menu-list -->
        <div class="collapse d-flex justify-content-end w-100" style="height: 1.75em;">
                    
            <div class="navbar-nav">

                <!-- nav-links -->
                <NavLink :class="{ 'text-xpress-green-200': 
                                        ($page.component === 'CartXpressPage/Home' ||
                                         $page.component === 'CartXpressPage/Login' ||
                                         $page.component === 'CartXpressPage/Register') 
                                 }" 
                         :href="route('home')">
                    <i class="fa-solid fa-house me-1"></i>Home</NavLink>

                <NavLink :class="{ 'text-xpress-green-200': 
                                        ($page.component === 'CartXpressPage/CustomerProfile' ||
                                         $page.component === 'CartXpressPage/VendorProfile' ||
                                         $page.component === 'CartXpressPage/ShopForm') 
                                 }"
                         :href="route('profile')">
                    <i class="fa-solid fa-user me-1"></i>Profile</NavLink>   
                
                <template v-if="hasLogin">
                            
                    <button class="nav-item nav-link text-light nato-sans-jp 
                            fs-xpress-sm-300 align-self-center ms-1 px-5
                            btn bg-xpress-purple-100
                            bg-hover-xpress-to-gray-200 ms-5"
                            href="#" @click.prevent="logout"
                            style="padding-top: 0.2em; padding-bottom: 0.2em;">
                            Logout</button>

                </template>
                <template v-else>
                
                    <!-- nav buttons -->
                    <Link class="nav-item nav-link text-light nato-sans-jp 
                            fs-xpress-sm-300 align-self-center ms-3 px-5
                            btn bg-xpress-orange-100
                            bg-hover-xpress-to-gray-200" 
                            :href="route('login')"
                            style="padding-top: 0.2em; padding-bottom: 0.2em;">
                            Login</Link>
                            
                    <Link class="nav-item nav-link text-light nato-sans-jp 
                            fs-xpress-sm-300 align-self-center ms-1 px-5
                            btn bg-xpress-purple-100
                            bg-hover-xpress-to-gray-200"
                            :href="route('register')"
                            style="padding-top: 0.2em; padding-bottom: 0.2em;">
                            Register</Link>
                    </template>

            </div>
        </div>
    </nav>
    <!---------- Navbar Section END -->
</template>

<script setup>
    import { inject } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';
    import NavLink from './SubComponent/NavLink.vue';
    import { Inertia } from '@inertiajs/inertia';

    const hasLogin = inject('hasLogin');

    function logout() {
        Inertia.post(route('logout'));
    }
</script>

<style lang="scss" scoped>

</style>