<template>
    <div class="text-center bg-deep-blue text-white border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow-sm dark:text-gray-300">
        <div class="text-gray-500 font-medium" md-1>
            <slot name="header"/>
        </div>
        <slot/>
    </div>
</template>
