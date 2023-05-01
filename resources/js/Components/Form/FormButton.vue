<template>
    <div class="mt-4 py-3 w-1/2 mx-auto text-center">
        <button class="edit-button" type="submit">
            {{ text }}
        </button>
    </div>
</template>

<script setup>
import {defineProps} from "vue";

defineProps({
    text: String
})

</script>
