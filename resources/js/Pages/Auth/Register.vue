<template>
    <MainLayout>
        <div class="grid grid-cols-1 grid-rows-5 bg-light-yellow">
            <form @submit.prevent="register" class="row-start-2 row-span-3 main-form w-1/2 m-auto">
                <label class="label font-md text-4xl">Реєстрація</label>
                <div class="mx-auto">
                    <div class="grid grid-cols-2 gap-5 px-10 ">
                        <div>
                            <label for="name" class="label">Ім'я</label>
                            <input id="name" v-model="form.name" type="text"
                                   class="input"/>
                            <div v-if="form.errors.name" class="input-error">
                                {{form.errors.name }}
                            </div>
                        </div>
                        <div>
                            <label for="surname" class="label">Прізвище</label>
                            <input id="surname" v-model="form.surname" type="text"
                                   class="input"/>
                            <div v-if="form.errors.surname" class="input-error">
                                {{form.errors.surname }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 w-1/2 mx-auto">
                        <label for="email" class="label">Електронна пошта</label>
                        <input id="email" v-model="form.email" type="text"
                               class="input"/>
                        <div v-if="form.errors.email" class="input-error">
                            {{form.errors.email }}
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5 px-10 ">
                        <div class="mt-4">
                            <label for="password" class="label">Пароль</label>
                            <input id="password" v-model="form.password"
                                   type="password" class="input"/>
                            <div v-if="form.errors.password" class="input-error">
                                {{ form.errors.password }}
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="password_confirmation" class="label">Повторіть пароль</label>
                            <input id="password_confirmation" v-model="form.password_confirmation"
                                   type="password" class="input"/>
                        </div>
                    </div>
                    <div class="mt-4 py-3 w-1/2 mx-auto ">
                        <button class="register-button" type="submit">
                            Зареєструватись!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";
const form = useForm({
    name: null,
    surname: null,
    email: null,
    password: null,
    password_confirmation: null,
})
const register = () => form.post(route('register.store'))
</script>
