<template>
    <MainLayout>
        <div class="h-screen">
            <div>Щоб бачити цю сторінку, необхідно пітвердити електронну пошту!</div>
            <div>
                <Link :href="route('verification.send')" method="POST" as="button" class="main-button">Надіслати лист для підтвердження</Link>
            </div>
        </div>

    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import MainLayout from "@/Layouts/MainLayout.vue";

</script>
