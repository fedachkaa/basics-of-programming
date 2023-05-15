<template>
    <div class="font-bold">ТОП {{top}}</div>
    <div class="m-2 p-3 border-2 border-deep-blue rounded shadow-deep-blue shadow-xl">
        <div> {{ user.user}} </div>
        <div> Рейтинг: <b>{{ user.rating}} </b></div>
    </div>
</template>

<script setup>
import {defineProps} from "vue";



defineProps({
    user: Array,
    top: String
})

</script>
