<template>
    <Link :href="route('study.edit', {study: studySection.id})"
          as="button"
          method="GET"
          class="edit-button">Змінити</Link>
</template>

<script setup>
import { Link  } from '@inertiajs/vue3'
import {defineProps} from "vue";

defineProps({
    studySection: Object
})

</script>
