<template>
    <div class="pb-3 text-center">
        <button class="signup-button" type="submit">
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
