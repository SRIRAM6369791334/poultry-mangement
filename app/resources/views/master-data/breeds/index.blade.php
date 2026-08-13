<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Breed" search-placeholder="Search breeds...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Breed</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Type</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Std Weight (kg)</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Std FCR</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Target Days</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                        <div class="text-xs text-gray-500">{{ $item->code }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->breedType?->name ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->standard_weight_kg ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->standard_fcr ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->target_days ?: '—' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('breeds.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">No breeds found.</td></tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>