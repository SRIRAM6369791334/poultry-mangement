@props(['title', 'createUrl' => null, 'createLabel' => 'Create', 'searchPlaceholder' => 'Search...', 'columns' => null])

<div class="space-y-4">
    <x-page-header :title="$title">
        @if ($createUrl)
            <a href="{{ $createUrl }}" class="inline-flex items-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                {{ $createLabel }}
            </a>
        @endif
    </x-page-header>

    <form method="GET" class="flex items-center gap-3">
        <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            placeholder="{{ $searchPlaceholder }}"
            class="block w-full max-w-xs rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm"
        />
        <button type="submit" class="inline-flex items-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            Search
        </button>
        @if (request('q'))
            <a href="{{ url()->current() }}" class="text-sm text-gray-500 hover:text-gray-700">Clear</a>
        @endif
    </form>

    <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-black/5">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        {{ $thead }}
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    {{ $tbody }}
                </tbody>
            </table>
        </div>

        @if (method_exists($items ?? null, 'links') && $items->hasPages())
            <div class="border-t border-gray-200 px-4 py-3">
                {{ $items->links() }}
            </div>
        @endif
    </div>
</div>
