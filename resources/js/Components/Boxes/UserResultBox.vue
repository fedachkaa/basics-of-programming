<template>
    <div v-for="(item, index) in user_result" v-bind:key="index">
        <div class="text-xl">Тема {{ id }}. {{ index }}</div>
        <div class="bg-deep-blue w-fit mx-auto rounded-md text-white text-xl p-1 m-2">Результат: {{ item[0] }}/{{ item[1]}}</div>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    id: Number,
    user_result: Object
})

</script>
