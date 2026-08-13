@props(['title' => '', 'subtitle' => null])

<div class="flex items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
        @if ($subtitle)
            <p class="mt-1 text-sm text-gray-500">{{ $subtitle }}</p>
        @endif
    </div>
    <div class="flex items-center gap-3 shrink-0">
        {{ $slot }}
    </div>
</div>
