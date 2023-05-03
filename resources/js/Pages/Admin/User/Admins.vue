<template>
    <AdminLayout>
        <div class="h-screen">
            <div class="text-3xl font-medium text-center m-3">Адміністратори</div>

            <div class="grid grid-cols-4 gap-5 place-items-center">
                <div v-for="(admin, index) in admins" v-bind:key="index">
                    <UserBox :user="admin" class="box"/>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>


<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import UserBox from "@/Components/Boxes/UserBox.vue";

defineProps({
    admins: Array
})


</script>
