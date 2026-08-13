<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Unit">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Code" name="code" :value="$item?->code" required hint="e.g. KG, BAG" />
            <x-forms.input label="Name" name="name" :value="$item?->name" required hint="e.g. Kilogram" />
            <x-forms.select label="Category" name="category" :options="[
                'weight' => 'Weight',
                'volume' => 'Volume',
                'quantity' => 'Quantity',
                'length' => 'Length',
                'area' => 'Area',
            ]" :selected="$item?->category ?? 'weight'" required />
            <x-forms.input label="Conversion Factor" name="conversion_factor" type="number" step="any" :value="$item?->conversion_factor ?? 1" required hint="Units per base unit of its category" />
        </div>
    </x-crud-form>
</x-app-layout>