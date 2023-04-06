<template>
    <MainLayout>
        <div class="h-screen flex flex-col place-content-center ml-10 gap-3">
            <h1 class="text-7xl font-bold">Опануй основи програмування разом з </h1>
            <h1 class="text-7xl font-bold text-deep-blue"> Basics of programming!</h1>
            <div>
                <a href="#section1">
                    <svg class="mt-20 mx-auto animate-bounce w-12 h-12 text-deep-blue border-2 rounded-full border-deep-blue" stroke-linecap="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div id="section1" class="h-screen flex flex-col place-content-center ml-10 gap-3">
            <h1 class="text-7xl font-bold text-center"> Що входить в навчальну програму?</h1>
            <div class="mt-10">
                <div v-for="studySection in studySections" :key="studySection.id" :studySection="studySection">
                    <div class="study-section"> {{studySection}}</div>
                </div>
            </div>
            <div>
                <a href="#section2">
                    <svg class="mx-auto animate-bounce w-12 h-12 text-deep-blue border-2 rounded-full border-deep-blue" stroke-linecap="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div id="section2" class="h-screen flex flex-col place-content-center gap-3">
            <h1 class="text-7xl font-bold text-center"> Щоб почати навчання - увійди або зареєструйся!</h1>
            <div class="flex flex-row justify-center gap-5 mt-20">
                <div>
                    <Link :href="route('register')" class="main-button">Зареєструватись</Link>
                </div>
                <div>
                    <Link :href="route('login')" class="main-button">Увійти</Link>
                </div>
            </div>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    studySections: Array,
});
const text1 = "Вітаємо на сайті з вивчення основ програмування!\n" +
    "На цьому курсі ви дізнаєтесь про обчислювальну техніку та історію її розвитку, про структуру сучасної інформатики, системи числення, алгоритми та багато іншого!\n"

const text2 = "Для того, щоб почати навчання - увійдіть в свій профіль, або зареєструйтесь, якщо ви вперше на цьому сайті.\n Успіхів у навчанні!"
</script>
