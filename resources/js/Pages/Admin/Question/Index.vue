<template>
    <AdminLayout title="Питання">
        <div class="text-center">
            <Link :href="route('questions.create')" as="button" class="create-button mb-10">Створити питання</Link>
        </div>

        <div class="text-center text-lg">
            <label for="study_section" class="label">Виберіть тему:</label>
            <select v-model="selectedStudySection" class="select-study-section">
                <option v-for="studySection in studySections" :key="studySection.id" :value="studySection">{{studySection.title}}</option>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-5 m-3 place-items-center">
            <div v-for="question in selectedQuestions()" :key="question.id" :question="question" class="w-full">
                <div v-if="selectedStudySection.id === question.study_section_id" class="h-full">
                    <QuestionBox :question="question" class="box"/>
                </div>
            </div>
        </div>
    </AdminLayout>

</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import { ref } from 'vue'

import AdminLayout from "@/Layouts/AdminLayout.vue";
import QuestionBox from "@/Components/Boxes/QuestionBox.vue";


const props = defineProps({
    questions: Array,
    studySections: Array
})

const selectedStudySection = ref(props.studySections[0]);

const selectedQuestions = () => {
    let selectedQuestionsArr = [];
    for (let i = 0; i < props.questions.length; i++){
        if (props.questions[i].study_section_id === selectedStudySection.value.id) {
            selectedQuestionsArr.push(props.questions[i]);
        }
    }
    return selectedQuestionsArr;
}
</script>
