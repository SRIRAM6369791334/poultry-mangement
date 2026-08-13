<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Breed Type">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Name" name="name" :value="$item?->name" required hint="e.g. Broiler, Layer, Breeder" />
            <x-forms.input label="Code" name="code" :value="$item?->code" required hint="e.g. BROILER" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Description" name="description" :value="$item?->description" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>