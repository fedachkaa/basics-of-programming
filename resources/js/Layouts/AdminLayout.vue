<template>
    <div class="wrapper">
        <header class="header">
            <div>
                <nav class="p-4 flex justify-between items-center">
                    <div>
                        <Link :href="route('admin')" class="font-serif-jost main-title">Адмін-панель: {{ title }}</Link>
                    </div>
                    <div class="flex justify-end">
                        <Link :href="route('user')" class="username"> {{user.name}}</Link>
                        <Link :href="route('logout')" class="main-button">Вийти</Link>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <div v-if="flashSuccess" class="flash-success">
                {{ flashSuccess }}
            </div>
            <slot></slot>
        </main>
        <footer class="bg-black mt-10 ">
            <div class="text-white font-bold text-2xl text-right p-5">
                Uzhhorod, Ukraine
            </div>
        </footer>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

defineProps({
    title: String
})

const  user = computed(() =>
    page.props.user,
)
const flashSuccess = computed(() =>
    page.props.flash.success
)
</script>
