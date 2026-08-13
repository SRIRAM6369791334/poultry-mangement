<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Feed Type" search-placeholder="Search feed types...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Feed Type</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Protein %</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Energy (kcal)</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Recommended Days</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                        <div class="text-xs text-gray-500">{{ $item->code }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->protein_percent ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->energy_kcal ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        @if ($item->recommended_start_day !== null)
                            Day {{ $item->recommended_start_day }} – {{ $item->recommended_end_day ?? 'Slaughter' }}
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('feed-types.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">No feed types found.</td></tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>