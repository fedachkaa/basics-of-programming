<template>
    <AdminLayout title="Головна">

        <div class="text-center text-3xl">Вітаємо в адмін-панелі, <strong>{{ admin.name }}</strong>!</div>

        <div class="border-b-2 p-2 ">
            <div class="text-xl font-bold m-2">Теми</div>
            <Link :href="route('admin-study.index')" as="button" class="main-button">Переглянути теми</Link>
            <Link :href="route('admin-study.create')" as="button" class="main-button">Створити тему</Link>
        </div>

        <div class="border-b-2 p-2">
            <div class="text-xl font-bold m-2">Питання</div>
            <Link :href="route('questions.index')" as="button" class="main-button">Переглянути питання</Link>
            <Link :href="route('questions.create')" as="button" class="main-button">Створити питання</Link>
        </div>

        <div class="border-b-2 p-2">
            <div class="text-xl font-bold m-2">Користувачі</div>
            <Link :href="route('admin.users')" as="button" class="main-button">Переглянути користувачів</Link>
            <Link :href="route('admin.admins')" as="button" class="main-button">Переглянути адміністраторів</Link>
        </div>

    </AdminLayout>
</template>

<script setup>

import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link  } from '@inertiajs/vue3'

defineProps({
    admin: Object
})
</script>
