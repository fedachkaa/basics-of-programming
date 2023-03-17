<template>
    <MainLayout/>
    <div class="grid grid-cols-1 grid-rows-4 bg-light-yellow">
        <form @submit.prevent="login" class="row-start-2 row-span-2  main-form w-1/2 m-auto">
            <label class="label font-md text-4xl">Авторизація</label>
                <div class="mt-4 w-1/2 mx-auto">
                    <label for="email" class="label">Електронна пошта</label>
                    <input id="email" v-model="form.email" type="text"
                           class="input"/>
                    <div v-if="form.errors.email" class="input-error">
                        {{form.errors.email }}
                    </div>
                </div>

            <div class="mt-4 w-1/2 mx-auto">
                <label for="password" class="label">Пароль</label>
                <input id="password" v-model="form.password"
                       type="password" class="input"/>
                <div v-if="form.errors.password" class="input-error">
                    {{ form.errors.password }}
                </div>
            </div>

            <div class="mt-4 py-3 w-1/2 mx-auto ">
                <button class="register-button" type="submit">
                    Увійти!
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";
const form = useForm({
    email: null,
    password: null,
})
const login = () => form.post(route('login.store'))
</script>
