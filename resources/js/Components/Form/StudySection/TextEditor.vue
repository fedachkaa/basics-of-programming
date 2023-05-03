<template>
    <Editor v-model="form.content"
            :api-key="api"
            :init="settings"
    />
</template>

<script setup>
import Editor from '@tinymce/tinymce-vue'
import {defineProps} from "vue";

const api = "14i6t718iubgqiaxrl0ughilerhjn7n7uxvaoj5h7a7hecgu";

const settings = {
    plugins: 'lists image',
    toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | h1 h2 h3 h4 h5 h6 | numlist bullist | image ',
    menubar: false,
    image_title : true,
    automatic_uploads: true,
    images_upload_url : '/admin/upload-image',
}

const props = defineProps({
    form: Object
})

</script>
