<template>
    <div>
        <div class="text-center font-bold text-lg">{{studySection.title}}</div>

        <div class="p-3" v-html="studySection.content.substring(0,250)+'...'"/>

        <div class="m-2 text-center">
            <EditStudySection :studySection="studySection"/>
            <DeleteStudySection :studySection="studySection"/>
        </div>
    </div>

</template>

<script setup>
import {defineProps} from "vue";

import EditStudySection from "@/Components/Buttons/EditStudySection.vue";
import DeleteStudySection from "@/Components/Buttons/DeleteStudySection.vue";


defineProps({
    studySection: Object
})

</script>
