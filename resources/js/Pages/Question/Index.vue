<template>
    <MainLayout>
        <div class="h-screen">
            <div class="">
                <h1 class="text-center text-3xl font-medium">Тестування до теми:</h1>
                <h1 class="text-center text-3xl font-medium text-deep-blue">{{studySection.title}}</h1>
                <form @submit.prevent="finish" class="text-center mt-20" >
                    <div class="text-3xl font-medium"> Питання №{{question.id}}: {{question.question}} </div>
                    <input class="input-radio" name="question" type="radio" id="variant_1" v-bind:value="question.variant_1" v-model="picked" >
                    <label class="label-radio" for="variant_1">{{question.variant_1}}</label>
                    <br>
                    <input class="input-radio" name="question" type="radio" id="variant_2" v-bind:value="question.variant_2" v-model="picked">
                    <label class="label-radio" for="variant_2">{{question.variant_2}}</label>
                    <br>
                    <input class="input-radio" name="question" type="radio" id="variant_3" v-bind:value="question.variant_3" v-model="picked">
                    <label class="label-radio" for="variant_3">{{question.variant_3}}</label>
                    <br>
                    <input class="input-radio" name="question" type="radio" id="variant_4" v-bind:value="question.variant_4" v-model="picked">
                    <label class="label-radio" for="variant_4">{{question.variant_4}}</label>
                    <br>
                    <button type="submit" @click="form.picked = picked" class="signup-button mt-3">Зберегти відповідь</button>
                </form>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import {useForm} from "@inertiajs/vue3";
import {watch} from "vue";

const props = defineProps({
    question: Object,
    studySection: Object
})

const form =  useForm({
    question: props.question,
    picked: null,
});
watch(() => props.question,
    (question) => form.question = props.question
);

const finish = () => form.post(route('testing.store', {onSuccess: () => form.reset()}))


</script>

