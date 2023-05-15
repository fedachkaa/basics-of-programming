<template>
    <AdminLayout title="Питання">
        <div class="flex justify-center">
            <form @submit.prevent="update" class="">
                <label class="label font-md text-4xl">Редагування питання</label>
                <SelectStudySection :form="form" :studySections="studySections"/>
                <Question :form="form"/>
                <Variant1 :form="form"/>
                <Variant2 :form="form"/>
                <Variant3 :form="form"/>
                <Variant4 :form="form"/>
                <Answer :form="form"/>
                <FormButton text="Змінити"/>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Question from "@/Components/Form/Question/Question.vue";
import Variant1 from "@/Components/Form/Question/Variant1.vue";
import Variant2 from "@/Components/Form/Question/Variant2.vue";
import Variant3 from "@/Components/Form/Question/Variant3.vue";
import Variant4 from "@/Components/Form/Question/Variant4.vue";
import Answer from "@/Components/Form/Question/Answer.vue";
import FormButton from "@/Components/Form/FormButton.vue";
import SelectStudySection from "@/Components/Form/Question/SelectStudySection.vue";

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
