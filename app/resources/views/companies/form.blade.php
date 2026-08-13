<x-app-layout>
    <x-crud-form :title="$title" :back-url="$backUrl" :form-url="$formUrl" :method="$method" submit-label="Save Company">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <x-forms.input label="Company Name" name="name" :value="$item?->name" required />
            <x-forms.input label="Code" name="code" :value="$item?->code" hint="Short code, e.g. SMPL" />
            <x-forms.input label="Registration Number" name="registration_number" :value="$item?->registration_number" />
            <x-forms.input label="Tax ID (GST/VAT)" name="tax_id" :value="$item?->tax_id" />
            <x-forms.input label="Email" name="email" type="email" :value="$item?->email" />
            <x-forms.input label="Phone" name="phone" :value="$item?->phone" />
            <x-forms.input label="Fiscal Year Start (MM-DD)" name="fiscal_year_start" :value="$item?->fiscal_year_start" hint="e.g. 04-01" />
            <x-forms.input label="Base Currency" name="base_currency" :value="$item?->base_currency" hint="ISO code, e.g. INR" />
            <div class="md:col-span-2">
                <x-forms.textarea label="Address" name="address" :value="$item?->address" rows="2" />
            </div>
            <x-forms.select label="Status" name="status" :options="\App\Enums\CommonStatus::labels()" :selected="$item?->status ?? 'active'" required />
        </div>
    </x-crud-form>
</x-app-layout>