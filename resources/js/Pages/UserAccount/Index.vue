<template>
    <MainLayout>
        <div class="text-center text-3xl font-medium my-5">Інформація про користувача</div>
        <div class="grid grid-cols-2 gap-3 flex justify-start border-2 border-black border-x-0 border-t-0 p-4 shadow-md shadow-deep-blue">
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
                <div v-for="study_section in study_sections" :key="study_section.id">
                <div class="text-xl">Тема {{study_section.id}}. {{study_section.title}}.</div>
                <div class="bg-deep-blue w-fit mx-auto rounded-md text-white text-xl p-1 m-2">Результат: {{study_section.pivot.user_result }}</div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Box from '@/Components/Box.vue'
import { Link  } from '@inertiajs/vue3'

defineProps({
    user: Object,
    study_sections: Object
})

</script>
