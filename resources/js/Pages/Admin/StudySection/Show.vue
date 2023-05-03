<template>
    <AdminLayout title="Теми">
        <div class="border-2 m-5 border-deep-blue">
            <div class="text-3xl text-center font-medium mt-4">{{studySection.title}}</div>

            <div class="m-10">
                <div class="text-xl text-center" v-html="studySection.content"/>
            </div>
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
