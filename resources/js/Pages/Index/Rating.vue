<template>
    <MainLayout>
        <div class="w-fit mx-auto border-4 border-dotted border-deep-blue p-4 mt-5">
            <div class="text-xl text-center font-bold">
                Формула рейтингу:
            </div>
            <div class="flex flex-row gap-2 justify-center text-xl">
                <table>
                    <tr class="border-b border-black">
                        <td>кількість питань, на які користувач дав правильну відповідь</td>
                    </tr>
                    <tr>
                        <td>загальна кількість питань, на які користувач дав відповідь</td>
                    </tr>
                </table>
                <div class="my-auto">
                    &times; кількість тем, які пройшов користувач
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 grid-rows-2 mt-10">
            <div class="col-span-2 user-rating">
                <UserRating :user="users_results[0]" top="1🥇"/>
            </div>

            <div class="col-span-1 user-rating">
                <UserRating :user="users_results[1]" top="2🥈"/>
            </div>

            <div class="col-span-1 user-rating">
                <UserRating :user="users_results[2]" top="3🥉"/>
            </div>
        </div>

    </MainLayout>
</template>

<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import UserRating from "@/Components/Boxes/UserRating.vue";

defineProps({
    first: Array,
    users_results: Array
})

</script>
