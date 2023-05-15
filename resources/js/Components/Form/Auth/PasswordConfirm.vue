<template>
    <div>
        <label for="password_confirmation" class="label">Повторіть пароль</label>
        <input id="password_confirmation" v-model="form.password_confirmation"
               type="password" class="input"/>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    form: Object
})

</script>
