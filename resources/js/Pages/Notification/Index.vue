<template>
    <MainLayout>
        <div class="text-4xl text-center">Сповіщення</div>
        <section v-if="notifications.data.length" class="text-xl">
            <div class="border-b border-deep-blue py-4 flex justify-between items-center" v-for="notification in notifications.data" :key="notification.id">
                <span v-if="notification.type==='App\\Notifications\\StudySectionPassed'" class="p-2">
                    Ви пройшли тему <strong>"{{notification.data.study_section_title}}"</strong>! <br>
                    <div v-if="notification.data.result * 2 < notification.data.count " class="text-red-500">
                        Результат: {{ notification.data.result }} / {{ notification.data.count}}.
                    </div>
                    <div v-else class="text-green-500">
                        Результат: {{ notification.data.result }} / {{ notification.data.count}}.
                    </div>
                </span>
                <div class="flex justify-end">
                    <Link :href="route('notification.update', {notification: notification.id})"
                          v-if="!notification.read_at"
                          as="button"
                          method="PUT"
                          class="edit-button">Прочитано</Link>
                    <Link :href="route('notification.destroy', {notification: notification.id})"
                          as="button"
                          method="DELETE"
                          class="delete-button">Видалити</Link>
                </div>
            </div>
        </section>
        <section v-else class="text-xl p-2">Ще немає сповіщень...</section>
    </MainLayout>
</template>

<script setup>

import MainLayout from "@/Layouts/MainLayout.vue";
import { Link } from '@inertiajs/vue3'

defineProps({
    notifications: Object
})
</script>
