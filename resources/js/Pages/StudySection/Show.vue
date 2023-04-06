<template>
    <MainLayout>
        <div class="h-screen flex flex-col items-center gap-4">
            <div class="text-3xl text-center font-medium mt-4">{{studySection.title}}</div>
            <div class="text-xl text-center">{{studySection.content}}</div>
            <Link :href="route('testing', {id: studySection.id, question_id: 1})" as="button" class="signup-button w-fit"> Почати тестування!</Link>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    studySection: Object,
})


</script>
