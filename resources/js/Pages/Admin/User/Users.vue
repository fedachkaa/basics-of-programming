<template>
    <AdminLayout>
        <div class="h-screen">
            <div class="text-3xl font-medium text-center m-3">Користувачі</div>
            <div class="grid grid-cols-4 justify-center">
                <div class="header-table-l"> Ідентифікатор </div>
                <div class="header-table"> Ім'я та прізвище </div>
                <div class="header-table"> Електронна пошта </div>
                <div class="header-table-r"> Верифікація </div>
            </div>
            <div class="grid grid-cols-4" v-for="(item, index) in users" v-bind:key="index">
                <div class="item-table-l"> {{ item.id }}</div>
                <div class="item-table">{{item.name}} {{item.surname}}</div>
                <div class="item-table">{{item.email}}</div>
                <div class="item-table-r" v-if="item.email_verified_at!=null">Так</div>
                <div class="item-table-r" v-else>Ні</div>
            </div>
        </div>
    </AdminLayout>
</template>


<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

defineProps({
    users: Array
})


</script>
