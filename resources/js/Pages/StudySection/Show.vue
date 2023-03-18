<template>
    <MainLayout>
        <div class="flex flex-col gap-4">
            <div class="text-3xl text-center font-medium mt-4">{{studySection.title}}</div>
            <div class="text-xl text-center">{{studySection.content}}</div>
            <Link as="button" class="test-button mx-auto"> Почати тестування!</Link>
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
