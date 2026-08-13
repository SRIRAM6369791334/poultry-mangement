<x-app-layout>
    <div class="max-w-3xl">
        <x-page-header title="Organization Settings" subtitle="Company-wide defaults used across the platform">
        </x-page-header>

        <form method="POST" action="{{ route('organization.update') }}" class="mt-6">
            @csrf
            @method('PUT')

            <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-black/5">
                <div class="px-6 py-6 space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <x-forms.input label="Organization Name" name="name" :value="$organization?->name" required />
                        <x-forms.input label="Contact Email" name="contact_email" type="email" :value="$organization?->contact_email" />
                        <x-forms.input label="Phone" name="phone" :value="$organization?->phone" />
                        <x-forms.select
                            label="Default Currency"
                            name="default_currency"
                            :options="\App\Models\Currency::query()->orderBy('code')->pluck('code', 'code')"
                            :selected="$organization?->default_currency ?? 'INR'"
                            required
                        />
                        <x-forms.input label="Fiscal Year Start (MM-DD)" name="fiscal_year_start" :value="$organization?->fiscal_year_start" hint="e.g. 04-01 for April start" />
                    </div>
                    <x-forms.textarea label="Address" name="address" :value="$organization?->address" rows="2" />
                </div>
                <div class="border-t border-gray-200 bg-gray-50 px-6 py-4 flex items-center justify-between">
                    <span class="text-xs text-gray-500">Plan: <span class="font-medium text-gray-700 uppercase">{{ $organization?->plan }}</span></span>
                    <button type="submit" class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>