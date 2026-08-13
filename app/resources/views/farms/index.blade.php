<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Farm" search-placeholder="Search farms...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Farm</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Type</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Capacity</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Ownership</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Sheds</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                        <div class="text-xs text-gray-500">{{ $item->code }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ ucwords(str_replace('_', ' ', $item->farm_type)) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->total_capacity ? number_format($item->total_capacity) : '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ ucfirst($item->ownership) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->sheds_count }}</td>
                    <td class="px-6 py-4"><x-status-badge :status="$item->status" /></td>
                    <td class="px-6 py-4 text-right whitespace-nowrap">
                        <a href="{{ route('sheds.index', ['farm_id' => $item->id]) }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">Sheds</a>
                        <a href="{{ route('farms.edit', $item) }}" class="ml-3 text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-500">No farms found.</td>
                </tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>