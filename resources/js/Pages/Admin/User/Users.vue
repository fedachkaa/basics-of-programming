<template>
    <AdminLayout>
        <div class="h-screen">
            <div class="text-3xl font-medium text-center m-5">Користувачі</div>

            <div class="grid grid-cols-4 gap-5 place-items-center">
                <div v-for="(user, index) in users" v-bind:key="index">
                    <UserBox :user="user" class="box"/>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>


<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import UserBox from "@/Components/Boxes/UserBox.vue";

defineProps({
    users: Array
})


</script>
