<script>
export default {
    name: 'CategoriesIndex'
}
</script>

<script setup>

//Layout de la app
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'
import DangerButton from "@/Components/DangerButton.vue";

//Defincion de props para traer categories
defineProps({
    categories: {
        type: Object,
        required: true
    }
});

//Funcion delete
const deleteCategory = id => {
    if(confirm('Estas seguro?')) {
        Inertia.delete(route('categories.destroy', id))
    }
}
</script>

<template>
    <AppLayout title="Categories">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h1>
        </template>
        <div class="py-6">
            <div class="max-w-7x6 mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create categories')">
                        <Link :href="route('categories.create')"
                              class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Create category
                        </Link>
                    </div>
                    <div class="mt-2">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li v-for="category in categories.data" :key="category.id"
                                class="flex justify-between gap-x-6 py-3">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-lg font-semibold leading-6 text-gray-900">{{ category.name }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-md leading-6 text-gray-900">
                                        <Link :href="route('categories.edit',category.id)" v-if="$page.props.user.permissions.includes('update categories')" class> Edit</Link>
                                        <DangerButton @click="deleteCategory(category.id)" v-if="$page.props.user.permissions.includes('delete categories')" class="py-2 px-4"> Delete</DangerButton>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--Paginacion-->
                    <div class="flex justify-between mt-2" v-if="$page.props.user.permissions.includes('create categories')">
                        <!--Si tiene mas de una pagina crea el boton-->
                        <Link v-if="categories.current_page > 1" :href="categories.prev_page_url"
                              class="py-2 px-4 rounded">
                            Prev
                        </Link>

                        <div v-else=""></div>

                        <!--Si no tiene mas pag no crea el boton next.-->
                        <Link v-if="categories.current_page < categories.last_page" :href="categories.next_page_url"
                              class="py-2 px-4 rounded">
                            Next
                        </Link>
                        <div v-else=""></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
