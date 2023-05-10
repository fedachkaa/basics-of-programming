<template>
    <MainLayout>
        <div class="h-screen">
            <div class="text-center text-3xl font-medium my-5">Інформація про користувача</div>
            <div class="grid grid-cols-2 gap-3 flex justify-start p-4">
                <div class="text-right my-auto text-xl">Ім'я: </div>
                <div class="bg-deep-blue w-fit rounded-md text-white text-xl p-3 ml-5">
                    {{user.name}}
                </div>
                <div class="text-right my-auto text-xl">Прізвище: </div>
                <div class="bg-deep-blue w-fit rounded-md text-white text-xl p-3 ml-5">
                    {{user.surname}}
                </div>
                <div class="text-right my-auto text-xl">Електронна пошта: </div>
                <div class="bg-deep-blue w-fit rounded-md text-white text-xl p-3 ml-5">
                    {{user.email}}
                </div>
            </div>

            <div v-if="user.is_admin !== 1">
                <div class="text-center text-3xl font-medium my-5">Прогрес</div>

                <div class="grid grid-cols-3 gap-5 justify-items-center text-center m-2">
                    <div v-for="(item, index) in user_results" v-bind:key="index" class="box w-full">
                        <UserResultBox :user_result="item" :id="index"/>
                    </div>
                </div>

            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import UserResultBox from "@/Components/Boxes/UserResultBox.vue";

defineProps({
    user: Object,
    user_results: Object
})

</script>
