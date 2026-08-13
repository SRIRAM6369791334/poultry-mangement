<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Breed">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.select label="Breed Type" name="breed_type_id" :options="$breedTypes->pluck('name', 'id')" :selected="$item?->breed_type_id" required />
            <x-forms.input label="Breed Name" name="name" :value="$item?->name" required hint="e.g. Cobb 500" />
            <x-forms.input label="Code" name="code" :value="$item?->code" hint="e.g. COBB500" />
            <x-forms.input label="Standard Weight (kg)" name="standard_weight_kg" type="number" step="any" :value="$item?->standard_weight_kg" />
            <x-forms.input label="Standard FCR" name="standard_fcr" type="number" step="any" :value="$item?->standard_fcr" />
            <x-forms.input label="Target Days" name="target_days" type="number" :value="$item?->target_days" hint="Marketing age in days" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Description" name="description" :value="$item?->description" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>