<template>
    <label for="content" class="label">Наповнення</label>
    <textarea id="content" v-model="form.content"
              type="textarea" class="input"/>
    <div v-if="form.errors.content" class="input-error">
        {{ form.errors.content }}
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
