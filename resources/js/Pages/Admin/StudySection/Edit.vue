<template>
    <AdminLayout title="Теми">
        <div class="h-screen flex justify-center">
            <form @submit.prevent="update" class="">
                <label class="label font-md text-4xl">Редагування теми</label>
                <Title :form="form"/>
                <Content :form="form"/>
                <FormButton text="Змінити!"/>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Title from "@/Components/Form/StudySection/Title.vue";
import Content from "@/Components/Form/StudySection/Content.vue";
import FormButton from "@/Components/Form/FormButton.vue";

const props = defineProps({
    studySection: Object,
})
const form = useForm({
    title: props.studySection.title,
    content: props.studySection.content
})
const update = () => form.put(route('study.update', {study: props.studySection.id}))

</script>
