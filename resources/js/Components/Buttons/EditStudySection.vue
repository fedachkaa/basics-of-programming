<template>
    <Link :href="route('admin-study.edit', {admin_study: studySection.id})"
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
