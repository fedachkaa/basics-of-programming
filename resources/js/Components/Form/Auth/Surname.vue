<template>
    <div>
        <label for="surname" class="label">Прізвище</label>
        <input id="surname" v-model="form.surname" type="text"
               class="input"/>
        <div v-if="form.errors.surname" class="input-error">
            {{form.errors.surname }}
        </div>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
