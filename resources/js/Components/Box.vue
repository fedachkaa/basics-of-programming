<template>
    <div class="text-center bg-gray-700 text-white border border-gray-200 dark:border-gray-800 rounded-md p-4 ">
        <div class="text-gray-500 font-medium">
            <slot name="header"/>
        </div>
        <slot/>
    </div>
</template>
