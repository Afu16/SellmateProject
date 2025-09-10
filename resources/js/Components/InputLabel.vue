<script setup>
defineProps({
    value: String,
});
</script>

<template>
    <label class="block font-pilcrow font-pilcrow-heavy text-md text-white">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
