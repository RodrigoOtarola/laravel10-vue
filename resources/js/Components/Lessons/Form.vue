<script>
export default {
    name: 'LessonsForm'
}
</script>

<script setup>
//Comunicacion desendente
import FormSection from "@/Components/FormSection.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton
    from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/SecondaryButton.vue";
import Checkbox from "../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/Checkbox.vue";
import CollectionSelector from "@/Components/Common/CollectionSelector.vue";

defineProps({
    form: {
        type: Object,
        required: true
    },
    //Esta en falso, por que solo si me envia desde el componente, se realiza
    updating: {
        type: Boolean,
        required: false,
        default: false
    },
    //Para recibir los arreglos de levels y categories
    levels: {
        type: Object,
        required: true
    },
    categories: {
        type: Object,
        required: true
    }
})
//Comunicación ascendente
defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Updating Lessons' : 'Create Lessons' }}
        </template>
        <template #description>
            {{ updating ? 'Update the selected Lessons' : 'Create a new Lessons' }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name"/>
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name"
                           class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.name" class="mt-2"/>

                <InputLabel for="name" value="Description"/>
                <TextInput id="description" v-model="form.description" type="text" autocomplete="description"
                           class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.description" class="mt-2"/>

                <InputLabel for="name" value="Contenido URL"/>
                <TextInput id="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri"
                           class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.content_uri" class="mt-2"/>

                <InputLabel for="name" value="PDF"/>
                <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2"/>

                <InputLabel for="name" value="Level"/>
                <select>
                    <option v-for="level in levels" :value="level.id">{{ level.name }}</option>
                </select>
                <InputError :message="$page.props.errors.level_id" class="mt-2"/>

                <CollectionSelector :collection="categories"></CollectionSelector>

            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
