@props(['label', 'value', 'icon' => null, 'color' => 'text-gray-600', 'href' => null])

@php
    $classes = 'rounded-lg bg-white shadow ring-1 ring-black/5 p-5 flex items-center gap-4';
    $classes .= $href ? ' hover:ring-emerald-500/40 transition' : '';
@endphp

@if ($href)
    <a href="{{ $href }}" class="{{ $classes }}">
@else
    <div class="{{ $classes }}">
@endif
    <div class="h-11 w-11 rounded-lg bg-gray-50 ring-1 ring-gray-200 flex items-center justify-center shrink-0">
        @if ($icon)
            <svg class="h-6 w-6 {{ $color }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
            </svg>
        @endif
    </div>
    <div class="min-w-0">
        <div class="text-2xl font-bold text-gray-900">{{ $value }}</div>
        <div class="text-sm text-gray-500">{{ $label }}</div>
    </div>
@if ($href)
    </a>
@else
    </div>
@endif
