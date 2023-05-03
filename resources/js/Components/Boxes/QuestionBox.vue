<template>
    <div>
        <div class="text-center font-bold text-lg">{{question.question}}</div>

        <div v-if="question.answer === question.variant_1" class="text-green-500 font-bold">Варіант 1: {{question.variant_1}}</div>
        <div v-else>Варіант 1: {{question.variant_1}}</div>

        <div v-if="question.answer === question.variant_2" class="text-green-500 font-bold">Варіант 2: {{question.variant_2}}</div>
        <div v-else>Варіант 2: {{question.variant_2}}</div>

        <div v-if="question.answer === question.variant_3" class="text-green-500 font-bold">Варіант 3: {{question.variant_3}}</div>
        <div v-else>Варіант 3: {{question.variant_3}}</div>

        <div v-if="question.answer === question.variant_4" class="text-green-500 font-bold">Варіант 4: {{question.variant_4}}</div>
        <div v-else>Варіант 4: {{question.variant_4}}</div>

        <div class="m-2 text-center">
            <EditQuestion :question="question"/>
            <DeleteQuestion :question="question"/>
        </div>
    </div>

</template>

<script setup>
import {defineProps} from "vue";

import DeleteQuestion from "@/Components/Buttons/DeleteQuestion.vue";
import EditQuestion from "@/Components/Buttons/EditQuestion.vue";


defineProps({
    question: Object
})

</script>
