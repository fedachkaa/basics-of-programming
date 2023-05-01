<template>
    <label for="answer" class="label">Правильний варіант відповіді</label>
    <textarea id="answer" v-model="form.answer"
              type="textarea" class="input"/>
    <div v-if="form.errors.answer" class="input-error">
        {{ form.errors.answer }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
