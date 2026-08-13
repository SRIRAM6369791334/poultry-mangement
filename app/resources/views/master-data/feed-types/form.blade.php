<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Feed Type">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Name" name="name" :value="$item?->name" required hint="e.g. Pre-Starter, Grower" />
            <x-forms.input label="Code" name="code" :value="$item?->code" required hint="e.g. PRESTARTER" />
            <x-forms.input label="Protein %" name="protein_percent" type="number" step="any" :value="$item?->protein_percent" />
            <x-forms.input label="Energy (kcal/kg)" name="energy_kcal" type="number" step="any" :value="$item?->energy_kcal" />
            <x-forms.input label="Recommended Start Day" name="recommended_start_day" type="number" :value="$item?->recommended_start_day" />
            <x-forms.input label="Recommended End Day" name="recommended_end_day" type="number" :value="$item?->recommended_end_day" hint="Leave blank if used until slaughter" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Nutritional Info" name="nutritional_info" :value="$item?->nutritional_info" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>