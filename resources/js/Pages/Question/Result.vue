<template>
    <MainLayout>
        <div v-if="result!== null" class="mx-auto text-center text-3xl p-3">
            <div class="label"> Результати тестування:</div>
            <div v-for="(item, index) in result" v-bind:key="index" class="p-3">
                <div v-if="item === 1" class="text-green-500">Питання №{{index}}: Правильно</div>
                <div v-else class="text-red-500">Питання №{{index}}: Не правильно</div>
            </div>
            <div class="label"> Всього: {{ total }} / {{ Object.keys(result).length }} </div>
        </div>

        <div v-else>
            Нема результатів
        </div>
    </MainLayout>
</template>

<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    result: [Object, null],
    total: Number
})
</script>
