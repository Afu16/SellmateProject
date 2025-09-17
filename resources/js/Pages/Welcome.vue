<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />

                <main class="mt-6">
                    <img src="/assets/img/landing-img.png" alt="Welcome" class="mt-[15vh] w-full h-full">
                </main>
<div class="flex flex-col justify-center mt-12 gap-4">
    <Link
        v-if="canRegister"
        :href="route('register')"
        class="text-center mx-10  px-8  py-3 rounded-xl text-white font-pilcrow font-pilcrow-heavy bg-primary hover:bg-primary-400 transition-colors shadow-lg text-lg"
    >
        Mulai
    </Link>
    <Link
        v-if="canLogin"
        :href="route('login')"
        class="text-center mx-10  px-8  py-3 rounded-xl text-primary font-pilcrow font-pilcrow-heavy bg-white border-2 border-secondary hover:bg-secondary transition-colors shadow-lg text-lg"
    >
        Login
    </Link>
</div>
          
</template>
