<template>
    <div>
        <label for="name" class="label">Ім'я</label>
        <input id="name" v-model="form.name" type="text"
               class="input"/>
        <div v-if="form.errors.name" class="input-error">
            {{form.errors.name }}
        </div>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
