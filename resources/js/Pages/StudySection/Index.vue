<template>
    <MainLayout>
        <div class="bg-light-yellow">
            <div class="text-3xl text-center">Теми:</div>
            <div class="grid grid-cols-3 gap-5" >
                <Box v-for="studySection in studySections" :key="studySection.id" :studySection="studySection">
                    <Link :href="route('study.show', {study: studySection.id})">
                        <div class="text-xl font-medium mb-2"> {{studySection.id}}. {{studySection.title}}</div>
                        <img class="m-auto rounded-md content-center" src="../../../../storage/app/public/images/img6.jpeg">
                        <div>Пройдено / Не пройдено</div>
                    </Link>
                </Box>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import Box from '@/Components/Box.vue'
import { Link  } from '@inertiajs/vue3'

defineProps({
    studySections: Array,
})

</script>
