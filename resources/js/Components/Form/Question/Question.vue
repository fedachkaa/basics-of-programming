<template>
    <label for="question" class="label">Питання</label>
    <input id="question" v-model="form.question" type="text"
           class="input"/>
    <div v-if="form.errors.question" class="input-error">
        {{form.errors.question }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
