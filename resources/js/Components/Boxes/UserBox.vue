<template>
    <div class="text-center">
        <div class="font-bold text-lg">Користувач №{{user.id}}</div>
        <div>Ім'я: {{ user.name }}</div>
        <div>Прізвище: {{ user.surname }}</div>
        <div>Електронна пошта: {{ user.email }}</div>
        <div v-if="user.email_verified_at!=null" class="text-green-500">Верифікація: Так</div>
        <div v-else class="text-red-500">Верифікація: Ні</div>
    </div>

</template>

<script setup>
import {defineProps} from "vue";



defineProps({
    user: Object
})

</script>
