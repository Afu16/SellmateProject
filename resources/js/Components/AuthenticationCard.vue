<template>
    <div class=" p-3  flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full rounded-xl shadow-black border-2 border-black sm:max-w-md px-6 py-4 bg-primary shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
