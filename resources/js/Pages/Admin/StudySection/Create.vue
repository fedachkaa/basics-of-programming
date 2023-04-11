<template>
    <AdminLayout title="Теми">
        <div class="h-screen flex justify-center">
            <form @submit.prevent="store" class="">
                <label class="label font-md text-4xl">Створення теми</label>

                <div class="">
                    <label for="title" class="label">Назва</label>
                    <input id="title" v-model="form.title" type="text"
                           class="input"/>
                    <div v-if="form.errors.title" class="input-error">
                        {{form.errors.title }}
                    </div>
                </div>

                <div class="">
                    <label for="content" class="label">Наповнення</label>
                    <textarea id="content" v-model="form.content"
                           type="textarea" class="input"/>
                    <div v-if="form.errors.content" class="input-error">
                        {{ form.errors.content }}
                    </div>
                </div>

                <div class="mt-4 py-3 w-1/2 mx-auto text-center">
                    <button class="edit-button" type="submit">
                        Створити!
                    </button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const form = useForm({
    title: null,
    content: null
})
const store = () => form.post(route('study.store'))

</script>
