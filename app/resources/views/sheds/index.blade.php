<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Shed" search-placeholder="Search sheds...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Shed</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Farm</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Dimensions</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Capacity</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Housing</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->farm?->name ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        @if ($item->length_m && $item->width_m)
                            {{ $item->length_m }} × {{ $item->width_m }} m
                        @else
                            —
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->max_capacity ? number_format($item->max_capacity) : '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ ucwords(str_replace('_', ' ', $item->housing_type)) }}</td>
                    <td class="px-6 py-4"><x-status-badge :status="$item->status" /></td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('sheds.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500">No sheds found.</td>
                </tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>