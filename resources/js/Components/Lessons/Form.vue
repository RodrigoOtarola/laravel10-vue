<script>
export default {
    name:'LessonsForm'
}
</script>

<script setup>
//Comunicacion desendente
import FormSection from "@/Components/FormSection.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    form:{
        type:Object,
        required: true
    },
    //Esta en falso, por que solo si me envia desde el componente, se realiza
    updating:{
        type: Boolean,
        required: false,
        default: false
    }
})
//Comunicación ascendente
defineEmits(['submit'])
</script>
<!--            $table->string('name', 150);
            $table->text('description')->max(400);
            $table->string('image_uri')->nullable();
            $table->string('content_uri');
            $table->string('pdf_uri');

            -->
<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{updating ? 'Updating Lessons' : 'Create Lessons'}}
        </template>
        <template #description>
            {{updating ? 'Update the selected Lessons':'Create a new Lessons'}}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="name" value="Name"/>
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name"
                           class="mt-1 block w-full"/>
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>
