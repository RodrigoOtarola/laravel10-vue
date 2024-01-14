<script setup>

import { ref } from 'vue';

defineProps({
    collection:{
        type: Array,
        required: true
    }
})

const seleccion = ref([])
</script>

<template>
    <select>
        <option v-for="(item,index) in collection" :key="index">{{ item?.name? }}</option>
    </select>
</template>
