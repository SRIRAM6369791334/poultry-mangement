@props(['href', 'active' => false, 'icon' => null])

@php
    $classes = $active
        ? 'bg-slate-800 text-white'
        : 'text-slate-300 hover:bg-slate-800 hover:text-white';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center gap-3 rounded-md px-3 py-2 transition ' . $classes]) }}>
    @if ($icon)
        <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
        </svg>
    @endif
    <span class="truncate">{{ $slot }}</span>
</a>
