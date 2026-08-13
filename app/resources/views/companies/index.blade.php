<x-app-layout>
    <x-crud-index :title="$title" :create-url="$createUrl" create-label="Add Company" search-placeholder="Search companies...">
        <x-slot name="thead">
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Name</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Code</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Registration</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Email</th>
            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->code }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->registration_number ?: '—' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item->email ?: '—' }}</td>
                    <td class="px-6 py-4"><x-status-badge :status="$item->status" /></td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('companies.edit', $item) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-500">No companies found.</td>
                </tr>
            @endforelse
        </x-slot>
    </x-crud-index>
</x-app-layout>