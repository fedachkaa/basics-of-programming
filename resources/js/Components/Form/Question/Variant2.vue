<template>
    <label for="variant_2" class="label">Варіант відповіді №2</label>
    <textarea id="variant_2" v-model="form.variant_2"
              type="textarea" class="input"/>
    <div v-if="form.errors.variant_2" class="input-error">
        {{ form.errors.variant_2 }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
