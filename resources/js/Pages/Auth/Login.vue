<template>
    <MainLayout>
        <div class="p-10">
            <form @submit.prevent="login" class="main-form w-fit m-auto">
                <label class="label font-md text-4xl">Авторизація</label>
                <div class="flex flex-col gap-5">
                    <Email :form="form"/>
                    <Password :form="form"/>
                    <Button text="Увійти!"/>
                </div>
            </form>
        </div>
    </MainLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";
import Email from "@/Components/Form/Auth/Email.vue";
import Password from "@/Components/Form/Auth/Password.vue";
import Button from "@/Components/Form/Auth/Button.vue";

const form = useForm({
    email: null,
    password: null,
})
const login = () => form.post(route('login.store'))

</script>
