<template>
    <label for="variant_1" class="label">Варіант відповіді №1</label>
    <textarea id="variant_1" v-model="form.variant_1"
              type="textarea" class="input"/>
    <div v-if="form.errors.variant_1" class="input-error">
        {{ form.errors.variant_1 }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
