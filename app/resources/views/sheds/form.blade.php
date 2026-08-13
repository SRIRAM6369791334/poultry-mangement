<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Shed">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.select label="Farm" name="farm_id" :options="$farms->pluck('name', 'id')" :selected="$item?->farm_id ?? $preselectedFarmId" required />
            <x-forms.input label="Shed Name / Number" name="name" :value="$item?->name" required hint="Unique within the farm, e.g. Shed A" />
            <x-forms.input label="Length (m)" name="length_m" type="number" step="any" :value="$item?->length_m" />
            <x-forms.input label="Width (m)" name="width_m" type="number" step="any" :value="$item?->width_m" />
            <x-forms.input label="Area (m²)" name="area_sqm" type="number" step="any" :value="$item?->area_sqm" hint="Auto if length × width" />
            <x-forms.input label="Maximum Capacity (birds)" name="max_capacity" type="number" :value="$item?->max_capacity" />
            <x-forms.select label="Housing Type" name="housing_type" :options="$housingTypes" :selected="$item?->housing_type ?? 'deep_litter'" required />
            <x-forms.select label="Status" name="status" :options="[
                'empty' => 'Empty',
                'occupied' => 'Occupied',
                'maintenance' => 'Maintenance',
                'active' => 'Active',
                'inactive' => 'Inactive',
            ]" :selected="$item?->status ?? 'empty'" required />
            <x-forms.input label="Fans" name="fans_count" type="number" :value="$item?->fans_count" />
            <x-forms.input label="Feeders" name="feeders_count" type="number" :value="$item?->feeders_count" />
            <x-forms.input label="Drinkers" name="drinkers_count" type="number" :value="$item?->drinkers_count" />
            <x-forms.input label="Heaters" name="heaters_count" type="number" :value="$item?->heaters_count" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Notes" name="notes" :value="$item?->notes" rows="2" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>