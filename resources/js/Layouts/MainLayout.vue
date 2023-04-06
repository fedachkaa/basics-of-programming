<template>
    <header class="header">
        <div class="container">
            <nav class="p-4 flex justify-between items-center">
                <div>
                    <Link :href="route('home')" class="font-serif-jost main-title">Basics of programming</Link>
                </div>
                <div class="flex gap-2">
                    <Link :href="route('rating')" class="main-button">Рейтинг</Link>
                    <Link :href="route('study.index')" class="main-button">Навчатись</Link>
                    <div v-if="user" class="flex gap-2">
                        <Link :href="route('user')" class="username"> {{user.name}}</Link>
                        <Link :href="route('logout')" class="main-button">Вийти</Link>
                    </div>
                    <div v-else class="flex gap-2">
                        <Link :href="route('register')" class="main-button">Зареєструватись</Link>
                        <Link :href="route('login')" class="main-button">Увійти</Link>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto">
        <div v-if="flashSuccess" class="flash-success">
            {{ flashSuccess }}
        </div>
        <slot></slot>
    </main>
    <footer class="bg-black text-white grid justify-items-end font-medium gap-2 p-2">
        <div>Ужгород, 2023</div>
    </footer>
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
