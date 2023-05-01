<template>
    <MainLayout>
        <div class="h-screen">
            <div class="text-center text-3xl font-medium my-5">Інформація про користувача</div>
            <div class="grid grid-cols-2 gap-3 flex justify-start p-4">
                <div class="text-right my-auto text-xl">Ім'я: </div>
                <div class="bg-deep-blue w-fit rounded-md text-white text-xl p-3 ml-5">
                    {{user.name}}
                </div>
                <div class="text-right my-auto text-xl">Прізвище: </div>
                <div class="bg-deep-blue w-fit rounded-md text-white text-xl p-3 ml-5">
                    {{user.surname}}
                </div>
                <div class="text-right my-auto text-xl">Електронна пошта: </div>
                <div class="bg-deep-blue w-fit rounded-md text-white text-xl p-3 ml-5">
                    {{user.email}}
                </div>
            </div>

            <div class="text-center text-3xl font-medium my-5">Прогрес</div>
            <div class="grid grid-cols-2 gap-3 justify-items-center text-center">
                <div v-for="(item, index) in user_results" v-bind:key="index">
                    <div v-for="(item1, index1) in item" v-bind:key="index1">
                        <div class="text-xl">Тема {{ index }}. {{ index1 }}</div>
                        <div class="bg-deep-blue w-fit mx-auto rounded-md text-white text-xl p-1 m-2">Результат: {{ item1 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Link  } from '@inertiajs/vue3'

defineProps({
    user: Object,
    user_results: Object
})

</script>
