<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Cause" search-placeholder="Search causes...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Cause</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Code</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Severity</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Symptoms</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->code }}</td>
                    <td class="px-6 py-4"><x-status-badge :status="$item->severity" /></td>
                    <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $item->symptoms ?: '—' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('disease-types.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">No mortality causes found.</td></tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>