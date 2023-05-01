<template>
<Link :href="route('admin-study.destroy', {admin_study: studySection.id})"
      as="button"
      method="DELETE"
      class="delete-button">Видалити</Link>
</template>

<script setup>
import { Link  } from '@inertiajs/vue3'
import {defineProps} from "vue";

defineProps({
    studySection: Object
})

</script>
