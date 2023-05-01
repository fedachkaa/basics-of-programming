<template>
    <label for="variant_4" class="label">Варіант відповіді №4</label>
    <textarea id="variant_4" v-model="form.variant_4"
              type="textarea" class="input"/>
    <div v-if="form.errors.variant_4" class="input-error">
        {{ form.errors.variant_4 }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
