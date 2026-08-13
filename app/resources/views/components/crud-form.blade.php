@props(['title', 'backUrl', 'formUrl', 'method' => 'POST', 'submitLabel' => 'Save'])

<div class="max-w-3xl">
    <x-page-header :title="$title">
        <a href="{{ $backUrl }}" class="inline-flex items-center gap-2 rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back
        </a>
    </x-page-header>

    <form method="POST" action="{{ $formUrl }}" class="mt-6">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-black/5">
            <div class="px-6 py-6 space-y-5">
                {{ $slot }}
            </div>
            <div class="border-t border-gray-200 bg-gray-50 px-6 py-4 flex items-center justify-end">
                <button type="submit" class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500">
                    {{ $submitLabel }}
                </button>
            </div>
        </div>
    </form>
</div>
