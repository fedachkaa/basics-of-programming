<template>
    <Link :href="route('questions.edit', {question: question.id})"
          as="button"
          method="GET"
          class="edit-button">Змінити</Link>
</template>

<script setup>
import { Link  } from '@inertiajs/vue3'
import {defineProps} from "vue";

defineProps({
    question: Object
})

</script>
