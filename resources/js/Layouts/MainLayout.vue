<template>
    <header class="header">
        <div class="container">
            <nav class="p-4 flex items-center justify-between">
                <div class="flex justify-start gap-2">
                    <Link href="#" class="main-button">Рейтинг</Link>
                    <Link :href="route('study.index')" class="main-button">Навчатись</Link>
                </div>

                <div>
                    <Link :href="route('home')" class="font-serif-jost main-title">Basics of programming</Link>
                </div>

                <div v-if="user" class="flex justify-end gap-2">
                    <Link :href="route('user')" class="username"> {{user.name}}</Link>
                    <Link :href="route('logout')" class="main-button">Вийти</Link>
                </div>
                <div v-else class="flex justify-end gap-2">
                    <Link :href="route('register')" class="main-button">Зареєструватись</Link>
                    <Link :href="route('login')" class="main-button">Увійти</Link>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot></slot>
    </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const page = usePage()

const  user = computed(() =>
    page.props.user,
)
const flashSuccess = computed(() =>
    page.props.flash.success
)

router.reload({ only: ['user', 'flashSuccess'] })

</script>
