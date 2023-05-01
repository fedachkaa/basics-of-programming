<template>
    <label for="title" class="label">Назва</label>
    <input id="title" v-model="form.title" type="text"
           class="input"/>
    <div v-if="form.errors.title" class="input-error">
        {{form.errors.title }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
