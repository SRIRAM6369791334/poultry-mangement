<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Farm">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Farm Name" name="name" :value="$item?->name" required />
            <x-forms.input label="Farm Code" name="code" :value="$item?->code" required hint="Short unique code, e.g. BR-01" />
            <x-forms.select label="Company" name="company_id" :options="$companies->pluck('name', 'id')" :selected="$item?->company_id" />
            <x-forms.select label="Farm Type" name="farm_type" :options="$farmTypes" :selected="$item?->farm_type ?? 'broiler'" required />
            <x-forms.select label="Ownership" name="ownership" :options="$ownershipTypes" :selected="$item?->ownership ?? 'owned'" required />
            <x-forms.input label="Total Capacity (birds)" name="total_capacity" type="number" :value="$item?->total_capacity" />
            <x-forms.input label="Region" name="region" :value="$item?->region" />
            <x-forms.input label="Latitude" name="latitude" type="number" step="any" :value="$item?->latitude" />
            <x-forms.input label="Longitude" name="longitude" type="number" step="any" :value="$item?->longitude" />
            <x-forms.select label="Status" name="status" :options="\App\Enums\CommonStatus::labels()" :selected="$item?->status ?? 'active'" required />
            <div class="md:col-span-2">
                <x-forms.textarea label="Address" name="address" :value="$item?->address" rows="2" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>