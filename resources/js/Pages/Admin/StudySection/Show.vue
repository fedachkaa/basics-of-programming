<template>
    <AdminLayout title="Теми">
        <div class="grid grid-cols-3 gap-2">
            <div class="justify-self-center text-lg font-bold">Назва:</div>
            <div class="col-span-2 justify-self-start">{{studySection.title}}</div>
            <div class="justify-self-center text-lg font-bold">Наповнення:</div>
            <div class="col-span-2 justify-self-start">{{studySection.content}}</div>
        </div>
        <div class="text-center m-4">
            <EditStudySection :studySection="studySection"/>
            <DeleteStudySection :studySection="studySection"/>
        </div>

    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import EditStudySection from "@/Components/Buttons/EditStudySection.vue";
import DeleteStudySection from "@/Components/Buttons/DeleteStudySection.vue";

const props = defineProps({
    studySection: Object,
})


</script>
