<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Cause">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Name" name="name" :value="$item?->name" required hint="e.g. Ascites, Heat Stress, Culling" />
            <x-forms.input label="Code" name="code" :value="$item?->code" required hint="e.g. ASCITES" />
            <x-forms.select label="Severity" name="severity" :options="[
                'low' => 'Low',
                'medium' => 'Medium',
                'high' => 'High',
                'critical' => 'Critical',
            ]" :selected="$item?->severity ?? 'medium'" required />
            <div class="md:col-span-2">
                <x-forms.textarea label="Symptoms" name="symptoms" :value="$item?->symptoms" />
            </div>
            <div class="md:col-span-2">
                <x-forms.textarea label="Description" name="description" :value="$item?->description" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>