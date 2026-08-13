<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Unit" search-placeholder="Search units...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Code</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Name</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Category</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Conversion Factor</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $item->code }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ ucfirst($item->category) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->conversion_factor }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('uoms.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">No units found.</td></tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>