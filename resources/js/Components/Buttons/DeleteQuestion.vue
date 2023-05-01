<template>
    <Link :href="route('questions.destroy', {question: question.id})"
          as="button"
          method="DELETE"
          class="delete-button">Видалити</Link>
</template>

<script setup>
import { Link  } from '@inertiajs/vue3'
import {defineProps} from "vue";

defineProps({
    question: Object,
})

</script>
