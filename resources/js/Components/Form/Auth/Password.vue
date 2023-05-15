<template>
    <div>
        <label for="password" class="label">Пароль</label>
        <input id="password" v-model="form.password"
               type="password" class="input"/>
        <div v-if="form.errors.password" class="input-error">
            {{ form.errors.password }}
        </div>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
