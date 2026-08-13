<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Vaccine" search-placeholder="Search vaccines...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Vaccine</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Administration</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Schedule Day</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->administration_method ? ucwords(str_replace('_', ' ', $item->administration_method)) : '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->schedule_day !== null ? 'Day '.$item->schedule_day : '—' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('vaccine-types.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">No vaccines found.</td></tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>