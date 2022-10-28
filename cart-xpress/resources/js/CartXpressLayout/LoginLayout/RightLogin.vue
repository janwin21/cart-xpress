<template>
    <!-- right -->
    <div class="col-3 text-center h-100 p-0" 
         style="background: url('/images/wonderful-images/wonderful-image-2.jpg') 
                no-repeat; background-size: cover;">

        <div class="w-100 h-100 bg-opaque-xpress-black-200 px-4 pt-4
                    d-flex flex-column justify-content-center align-items-center">

            <object data="/images/svg//mobile-interface.svg" type="" 
                    style="width: 4em;"></object>

            <h5 class="lato text-xpress-blue-300 
                    fs-xpress-sm-400 fw-xpress-600 mt-3 mx-4">
                    Login Title Header</h5>

            <p class="roboto text-light 
                    fs-xpress-sm-200">

                    <template v-if="form.errors.email || form.errors.password">
                        <span class="text-xpress-red-100">
                            {{ form.errors.email }} {{ form.errors.password }}
                        </span>
                    </template>
                    <template v-else>
                        Lorem ipsum, dolor sit amet
                    </template>
                    
            </p>

            <form class="w-100 text" @submit.prevent="submit">

                <div class="form-control p-0 border-0 w-100">
                    <input class="
                        fs-xpress-sm-300 text-light
                        border-top-0 border-start-0
                        border-end-0 border-bottom-1
                        bg-transparent w-100 px-2 mt-4" type="email" 
                        name="email" id="email" 
                        v-model="form.email"
                        placeholder="type your email...">
                </div>

                <div class="form-control p-0 border-0 mt-3 w-100">
                    <input class="
                        fs-xpress-sm-300 text-light
                        border-top-0 border-start-0
                        border-end-0 border-bottom-1
                        bg-transparent w-100 px-2" type="password"
                        v-model="form.password"
                        name="password" id="password" 
                        placeholder="type your password...">
                </div>

                <div class="form-control p-0 border-0 mt-3 text-start
                        d-flex justify-content-start align-items-center">

                    <input type="checkbox" v-model="form.remember" name="remember_me" />
                        <label class="roboto text-light fs-xpress-sm-200 ms-1" 
                            for="remember_me">Remember Me!</label>
                </div>

                <button class="btn bg-xpress-purple-300 
                    bg-hover-xpress-to-gray-200 text-light w-75 
                    rounded-pill py-1 fs-xpress-sm-300 
                    fw-xpress-400 mt-5" 
                    :disabled="form.processing"
                    type="submit">Login
                </button>

                <p class="text-light fs-xpress-sm-200 mt-2">
                    You don’t have account yet?</p>

                <Link class="roboto text-light fs-xpress-sm-200 
                    w-25 border-light" :href="route('profile.register')">
                    <p class="">Register</p>
                </Link>

            </form>

        </div>

    </div>
</template>

<script setup>
    import { Link, useForm } from '@inertiajs/inertia-vue3';
    import OneOptionModal from '../../CartXpressModal/OneOptionModal.vue';

    const form = useForm({
        email: '',
        password: '',
        remember: false,
    });

    const submit = () => {
        form.transform(data => ({
            ...data,
            remember: form.remember ? 'on' : '',
        })).post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };

</script>

<style lang="scss" scoped>

</style>