<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Medicine" search-placeholder="Search medicines...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Medicine</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Active Ingredient</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Withdrawal (days)</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->active_ingredient ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->withdrawal_period_days }} days</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('medicine-types.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">No medicines found.</td></tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>