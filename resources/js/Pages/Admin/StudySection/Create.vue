<template>
    <AdminLayout title="Теми">
        <div class="flex justify-center">
            <form @submit.prevent="store" class="">
                <label class="label font-md text-4xl">Створення теми</label>
                <Title :form="form"/>
                <Content :form="form"/>
                <FormButton text="Створити!"/>
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
    count: Number
})

const form = useForm({
    id: props.count + 1,
    title: null,
    content: null
})

const store = () => form.post(route('admin-study.store'))

</script>
