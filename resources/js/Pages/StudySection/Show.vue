<template>
    <MainLayout>
        <div class="flex flex-col items-center gap-4">
            <div class="text-3xl text-center font-medium mt-4">{{studySection.title}}</div>

            <div class="m-10">
                <div class="text-xl text-center" v-html="content"/>
            </div>

            <Link :href="route('testing', {id: studySection.id})" as="button" class="signup-button w-fit"> Почати тестування!</Link>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    studySection: Object,
    content: String
})


</script>
