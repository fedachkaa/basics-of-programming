<template>
    <AdminLayout title="Теми">

            <div class="text-center">
                <Link :href="route('admin-study.create')" as="button" class="create-button mb-10">Створити тему</Link>
            </div>

            <div class="grid grid-cols-2 gap-5 m-3 place-items-center">
                <div v-for="studySection in studySections" :key="studySection.id" :studySection="studySection">
                    <Link :href="route('admin-study.show', {admin_study: studySection.id})" class="hover:cursor-pointer">
                        <StudySectionBox :studySection="studySection" class="box"/>
                    </Link>
                </div>
            </div>

    </AdminLayout>
</template>

<script setup>
import { Link  } from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";
import StudySectionBox from "@/Components/Boxes/StudySectionBox.vue";

defineProps({
    studySections: Array,
})

</script>
