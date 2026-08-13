<x-app-layout>
    <div class="max-w-4xl">
        <x-page-header :title="'Edit Role — '.$role->name" subtitle="Tick the permissions this role can perform. Changes apply immediately.">
            <a href="{{ route('roles.index') }}" class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
        </x-page-header>

        <form method="POST" action="{{ route('roles.update', $role) }}" class="mt-6 space-y-4">
            @csrf
            @method('PUT')

            @foreach ($modules as $module)
                <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-black/5">
                    <div class="px-5 py-3 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wide">{{ ucwords(str_replace('_', ' ', $module)) }}</h3>
                    </div>
                    <div class="px-5 py-4 flex flex-wrap gap-x-6 gap-y-2">
                        @foreach ($actions as $action)
                            @php
                                $permissionName = $module.'.'.$action;
                                $checked = $permissionsByModule[$module][$action] ?? false;
                            @endphp
                            <label class="inline-flex items-center gap-2 text-sm cursor-pointer">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permissionName }}"
                                    class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500"
                                    @checked($checked)
                                />
                                {{ ucfirst($action) }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="flex items-center justify-end gap-3">
                <button type="submit" class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                    Save Permissions
                </button>
            </div>
        </form>
    </div>
</x-app-layout>