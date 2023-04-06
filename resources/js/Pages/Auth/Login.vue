<template>
    <MainLayout>
        <div class="h-screen flex justify-center">
            <form @submit.prevent="login" class="main-form w-1/2 m-auto">
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

                <div class="mt-4 py-3 w-1/2 mx-auto text-center">
                    <button class="signup-button" type="submit">
                        Увійти!
                    </button>
                </div>
            </form>
        </div>
    </MainLayout>
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
