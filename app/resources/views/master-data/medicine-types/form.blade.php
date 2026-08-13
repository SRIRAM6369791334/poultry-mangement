<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Medicine">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Name" name="name" :value="$item?->name" required hint="e.g. Amoxicillin" />
            <x-forms.input label="Active Ingredient" name="active_ingredient" :value="$item?->active_ingredient" />
            <x-forms.input label="Withdrawal Period (days)" name="withdrawal_period_days" type="number" :value="$item?->withdrawal_period_days ?? 0" required hint="Days before harvest that medication is prohibited" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Description" name="description" :value="$item?->description" />
            </div>
        </div>
    </x-crud-form>
</x-app-layout>