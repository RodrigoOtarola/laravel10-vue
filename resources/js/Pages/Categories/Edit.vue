<script>
export default {
    name:'CategoryEdit'
}
</script>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";
import CategoryForm from "@/Components/Categories/Form.vue";

const props = defineProps({
    category:{
        type: Object,
        required: true
    }
})

const form = useForm({
    name: props.category.name
})
</script>
<template>
    <AppLayout>
        <template #header title="Edit">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Edit Categories</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7-xl mx-auto sm:px-6 lg:px8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <CategoryForm :updating="true" :form="form" @submit="form.put(route('categories.update',category.id))"></CategoryForm>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
