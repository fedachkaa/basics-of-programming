<template>
    <label for="study_section" class="label">Тема</label>
    <select id="study_section" v-model="form.study_section_id">
        <option v-for="studySection in studySections" v-bind:value="studySection.id">{{studySection.title}}</option>
    </select>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object,
    studySections: Array
})

</script>
