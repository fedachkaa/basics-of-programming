<template>
    <MainLayout>
        <div>
            <div class="text-center">
                <div class="m-3 text-xl">Щоб бачити цю сторінку, необхідно підтвердити електронну пошту!</div>
                <div>
                    <Link :href="route('verification.send')" method="POST" as="button" class="main-button">Надіслати лист для підтвердження</Link>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";

</script>
