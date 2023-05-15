<template>
    <MainLayout>
        <div>
            <div class="text-3xl text-center p-3">Теми:</div>
            <div class="grid grid-cols-1" >
                <div class="study-section" v-for="studySection in studySections" :key="studySection.id" :studySection="studySection">
                    <Link :href="route('study.show', {study: studySection.id})">
                        <div class="text-xl font-medium"> {{studySection.id}}. {{studySection.title}}</div>
                    </Link>
                </div>
            </div>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Link  } from '@inertiajs/vue3'

defineProps({
    studySections: Array,
})

</script>
