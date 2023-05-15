<template>
    <MainLayout>
        <div class="p-10">
            <form @submit.prevent="register" class="main-form w-fit mx-auto">
                <label class="label font-md text-4xl">Реєстрація</label>
                <div class="flex flex-col gap-5">
                    <div class="flex flex-row gap-3 justify-around">
                        <Name :form="form"/>
                        <Surname :form="form"/>
                    </div>

                    <div class="w-fit mx-auto">
                        <Email :form="form"/>
                    </div>

                    <div class="flex flex-row justify-around gap-5">
                        <Password :form="form"/>
                        <PasswordConfirm :form="form"/>
                    </div>

                    <Button text="Зареєструватись!"/>
                </div>
            </form>
        </div>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";
import Name from "@/Components/Form/Auth/Name.vue";
import Surname from "@/Components/Form/Auth/Surname.vue";
import Email from "@/Components/Form/Auth/Email.vue";
import Password from "@/Components/Form/Auth/Password.vue";
import PasswordConfirm from "@/Components/Form/Auth/PasswordConfirm.vue";
import Button from "@/Components/Form/Auth/Button.vue";

const form = useForm({
    name: null,
    surname: null,
    email: null,
    password: null,
    password_confirmation: null,
})
const register = () => form.post(route('register.store'))
</script>
