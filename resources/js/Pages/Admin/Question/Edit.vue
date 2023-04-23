<template>
    <AdminLayout title="Питання">
        <div class="h-screen flex justify-center">
            <form @submit.prevent="update" class="">
                <label class="label font-md text-4xl">Редагування питання</label>
                <div>
                    <label for="study_section" class="label">Тема</label>
                    <select id="study_section" v-model="form.study_section_id">
                        <option v-for="studySection in studySections" v-bind:value="studySection.id">{{studySection.title}}</option>
                    </select>
                </div>

                <div class="">
                    <label for="question" class="label">Питання</label>
                    <input id="question" v-model="form.question" type="text"
                           class="input"/>
                    <div v-if="form.errors.question" class="input-error">
                        {{form.errors.question }}
                    </div>
                </div>

                <div class="">
                    <label for="variant_1" class="label">Варіант відповіді №1</label>
                    <textarea id="variant_1" v-model="form.variant_1"
                              type="textarea" class="input"/>
                    <div v-if="form.errors.variant_1" class="input-error">
                        {{ form.errors.variant_1 }}
                    </div>
                </div>

                <div class="">
                    <label for="variant_2" class="label">Варіант відповіді №2</label>
                    <textarea id="variant_2" v-model="form.variant_2"
                              type="textarea" class="input"/>
                    <div v-if="form.errors.variant_2" class="input-error">
                        {{ form.errors.variant_2 }}
                    </div>
                </div>

                <div class="">
                    <label for="variant_3" class="label">Варіант відповіді №3</label>
                    <textarea id="variant_3" v-model="form.variant_3"
                              type="textarea" class="input"/>
                    <div v-if="form.errors.variant_3" class="input-error">
                        {{ form.errors.variant_3 }}
                    </div>
                </div>

                <div class="">
                    <label for="variant_4" class="label">Варіант відповіді №4</label>
                    <textarea id="variant_4" v-model="form.variant_4"
                              type="textarea" class="input"/>
                    <div v-if="form.errors.variant_4" class="input-error">
                        {{ form.errors.variant_4 }}
                    </div>
                </div>

                <div class="">
                    <label for="answer" class="label">Правильний варіант відповіді</label>
                    <textarea id="answer" v-model="form.answer"
                              type="textarea" class="input"/>
                    <div v-if="form.errors.answer" class="input-error">
                        {{ form.errors.answer }}
                    </div>
                </div>
                <div class="mt-4 py-3 w-1/2 mx-auto text-center">
                    <button class="edit-button" type="submit">
                        Змінити!
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";

const props = defineProps({
    question: Object,
    studySections: Array
})
const form = useForm({
    study_section_id: props.question.study_section_id,
    question: props.question.question,
    variant_1: props.question.variant_1,
    variant_2: props.question.variant_2,
    variant_3: props.question.variant_3,
    variant_4: props.question.variant_4,
    answer: props.question.answer
})
const update = () => form.put(route('questions.update', {question: props.question.id}))

</script>
