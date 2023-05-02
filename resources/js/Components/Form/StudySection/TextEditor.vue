<template>
    <Editor v-model="form.content"
            api-key="14i6t718iubgqiaxrl0ughilerhjn7n7uxvaoj5h7a7hecgu"
            :init="{
                plugins: 'lists',
                toolbar: 'bold | italic | underline | h1 | h2 | h3 | h4 | h5 | h6 | numlist bullist',
                menubar: false,
                }"
    />
</template>

<script setup>
import Editor from '@tinymce/tinymce-vue'
import {defineProps} from "vue";

const props = defineProps({
    form: Object
})

</script>
