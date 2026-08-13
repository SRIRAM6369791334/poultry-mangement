<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Vaccine">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Name" name="name" :value="$item?->name" required hint="e.g. ND+IB (Spray)" />
            <x-forms.select label="Administration Method" name="administration_method" :options="[
                'spray' => 'Spray',
                'drinking_water' => 'Drinking Water',
                'injection' => 'Injection',
                'eye_drop' => 'Eye Drop',
                'wing_web' => 'Wing Web Stab',
            ]" :selected="$item?->administration_method" />
            <x-forms.input label="Schedule Day" name="schedule_day" type="number" :value="$item?->schedule_day" hint="Recommended day of age" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Description" name="description" :value="$item?->description" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>