@props(['submit' => 'Save'])

<div class="flex items-center justify-end gap-3 pt-4">
    {{ $slot }}

    <button
        type="submit"
        class="inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500"
    >
        {{ $submit }}
    </button>
</div>
