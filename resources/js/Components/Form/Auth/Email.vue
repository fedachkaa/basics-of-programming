<template>
    <div>
        <label for="email" class="label">Електронна пошта</label>
        <input id="email" v-model="form.email" type="text"
               class="input"/>
        <div v-if="form.errors.email" class="input-error">
            {{form.errors.email }}
        </div>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
