<template>
    <label for="content" class="label">Наповнення</label>
    <TextEditor :form="form"/>
    <div v-if="form.errors.content" class="input-error">
        {{ form.errors.content }}
    </div>
</template>

<script setup>
import TextEditor from "@/Components/Form/StudySection/TextEditor.vue";
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
