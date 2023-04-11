<template>
    <MainLayout>
        <div class="h-screen">
            <div class="text-3xl font-medium text-center m-3">Результати користувачів</div>
            <div class="grid grid-cols-2 justify-center">
                <div class="header-table-l"> Користувач </div>
                <div class="header-table-r"> Результат </div>
            </div>
            <div class="grid grid-cols-2 " v-for="(item, index) in users_results" v-bind:key="index">
                <div class="item-table-l">{{index}}</div>
                <div class="item-table-r">{{item}}%</div>
            </div>
            <div class="text-sm text-right p-2">*Результат - це співвідношення кількості питань, на які користувач дав правильну відповідь, до загальної кількості питань.</div>
        </div>
    </MainLayout>
</template>


<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    users_results: Array
})


</script>
