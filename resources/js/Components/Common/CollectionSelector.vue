<script setup>

import {ref} from 'vue';

defineProps({
    collection: {
        type: Array,
        required: true
    }
})

const currentSelection = ref(1);
const selection = ref([])
const handleAddToSelection = () => {
    // Validación para no insertar elementos duplicados.
    let alreadyExists = false
    selection.value.forEach(item =>{
        if(item.id == currentSelection.value.id){
            alreadyExists = true;
            return
        }
    })
    if(alreadyExists){
        return
    }

    selection.value.push(currentSelection.value)
}

const handleRemoveSelection = (index)=>{
    // Remove elementos de la selección
    selection.value = selection.value.filter(item =>item.id !== index)
}
</script>

<template>
    <select v-model="currentSelection">
        <option v-for="(item,index) in collection" :key="index" :value="item">{{ item?.name }} </option>
    </select>
    <button @click="handleAddToSelection">Add</button>
    <div>
        <ul>
            <li v-for="(item, index) in selection" :key="index">{{item.name}} <span @click="handleRemoveSelection(item.id)">Remove</span></li>
        </ul>
    </div>
</template>
