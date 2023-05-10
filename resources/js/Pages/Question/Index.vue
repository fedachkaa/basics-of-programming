<template>
    <MainLayout>
        <div>
            <h1 class="text-center text-3xl font-medium">Тестування до теми:</h1>
            <h1 class="text-center text-3xl font-medium text-deep-blue">{{props.studySection.title}}</h1>

            <form @submit.prevent="submitAnswers" class="text-center" >
                <div v-for="(question, index) in questions" :key="index" class="w-1/2 mx-auto my-5">
                    <div class="flex flex-col box">
                        <div class="text-2xl font-medium"> Питання №{{question.id}}: {{question.question}} </div>

                        <label class="label-radio">
                            <input
                                class="input-radio"
                                type="radio"
                                :name="`question-${index}`"
                                :value="question.variant_1"
                                v-model="form.answers[index]"
                            />
                            {{ question.variant_1 }}
                        </label>

                        <label class="label-radio">
                            <input
                                class="input-radio"
                                type="radio"
                                :name="`question-${index}`"
                                :value="question.variant_2"
                                v-model="form.answers[index]"
                            />
                            {{ question.variant_2 }}
                        </label>

                        <label class="label-radio">
                            <input
                                class="input-radio"
                                type="radio"
                                :name="`question-${index}`"
                                :value="question.variant_3"
                                v-model="form.answers[index]"
                            />
                            {{ question.variant_3 }}
                        </label>

                        <label class="label-radio">
                            <input
                                class="input-radio"
                                type="radio"
                                :name="`question-${index}`"
                                :value="question.variant_4"
                                v-model="form.answers[index]"
                            />
                            {{ question.variant_4 }}
                        </label>
                    </div>
                </div>
                <button type="submit"  class="signup-button mt-3">Завершити тестування</button>
            </form>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    questions: Array,
    studySection: Object
})

const form =  useForm({
    answers: new Array(props.questions.length)
});

const submitAnswers = () => form.post(route('testing.store', {id: props.studySection.id}));

</script>


