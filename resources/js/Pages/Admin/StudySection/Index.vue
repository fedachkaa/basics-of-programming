<template>
    <AdminLayout title="Теми">
        <div class="h-screen">

            <div class="text-center">
                <Link :href="route('study.create')" as="button" class="create-button mb-10">Створити тему</Link>
            </div>

            <div class="grid grid-cols-2 border-b-2"  v-for="studySection in studySections" :key="studySection.id" :studySection="studySection">

                <div class="admin-study-section justify-self-end">
                    <Link :href="route('study.show', {study: studySection.id})">
                        <div class="text-xl font-medium">{{studySection.title}}</div>
                    </Link>
                </div>

                <div class="my-auto justify-self-start">
                    <EditStudySection :studySection="studySection"/>
                    <DeleteStudySection :studySection="studySection"/>
                </div>


            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Link  } from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";
import EditStudySection from "@/Components/EditStudySection.vue";
import DeleteStudySection from "@/Components/DeleteStudySection.vue";

defineProps({
    studySections: Array,
})

</script>
