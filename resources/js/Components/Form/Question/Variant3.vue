<template>
    <label for="variant_3" class="label">Варіант відповіді №3</label>
    <textarea id="variant_3" v-model="form.variant_3"
              type="textarea" class="input"/>
    <div v-if="form.errors.variant_3" class="input-error">
        {{ form.errors.variant_3 }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
