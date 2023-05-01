<template>
    <AdminLayout title="Питання">
        <div class="text-center">
            <Link :href="route('questions.create')" as="button" class="create-button mb-10">Створити питання</Link>
        </div>

        <table class="w-full text-center">
            <thead>
            <tr>
                <th class="border border-slate-300 ">Тема</th>
                <th class="border border-slate-300 ">Питання</th>
                <th class="border border-slate-300 ">Варіант 1</th>
                <th class="border border-slate-300 ">Варіант 2</th>
                <th class="border border-slate-300 ">Варіант 3 </th>
                <th class="border border-slate-300 ">Варіант 4</th>
                <th class="border border-slate-300">Правильна відповідь</th>
                <th class=""></th>
                <th class=""></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="question in questions" :key="question.id" :question="question">
                <td class="border border-slate-300">{{question.study_section_id}}</td>
                <td class="border border-slate-300">{{question.question}}</td>
                <td class="border border-slate-300">{{question.variant_1}}</td>
                <td class="border border-slate-300">{{question.variant_2}}</td>
                <td class="border border-slate-300">{{question.variant_3}}</td>
                <td class="border border-slate-300">{{question.variant_4}}</td>
                <td class="border border-slate-300">{{question.answer}}</td>
                <td class=""><EditQuestion :question="question"/></td>
                <td class=""><DeleteQuestion :question="question"/></td>
            </tr>
            </tbody>
        </table>
    </AdminLayout>

</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DeleteQuestion from "@/Components/Buttons/DeleteQuestion.vue";
import EditQuestion from "@/Components/Buttons/EditQuestion.vue";

const props = defineProps({
    questions: Array,
    studySections: Array
})


</script>
