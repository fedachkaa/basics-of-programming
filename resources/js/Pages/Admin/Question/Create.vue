<template>
    <AdminLayout title="Питання">
        <div class="h-screen flex justify-center">
            <form @submit.prevent="store">
                <label class="label font-md text-4xl">Створення питання</label>
                <SelectStudySection :form="form" :studySections="studySections"/>
                <Question :form="form"/>
                <Variant1 :form="form"/>
                <Variant2 :form="form"/>
                <Variant3 :form="form"/>
                <Variant4 :form="form"/>
                <Answer :form="form"/>
                <FormButton text="Створити"/>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import {defineProps} from "vue";

import AdminLayout from "@/Layouts/AdminLayout.vue";
import Question from "@/Components/Form/Question/Question.vue";
import Variant1 from "@/Components/Form/Question/Variant1.vue";
import Variant2 from "@/Components/Form/Question/Variant2.vue";
import Variant3 from "@/Components/Form/Question/Variant3.vue";
import Variant4 from "@/Components/Form/Question/Variant4.vue";
import Answer from "@/Components/Form/Question/Answer.vue";
import FormButton from "@/Components/Form/FormButton.vue";
import SelectStudySection from "@/Components/Form/Question/SelectStudySection.vue";


defineProps({
    studySections: Array,
})
const form = useForm({
    study_section_id: null,
    question: null,
    variant_1: null,
    variant_2: null,
    variant_3: null,
    variant_4: null,
    answer: null
})
const store = () => form.post(route('questions.store'))

</script>
