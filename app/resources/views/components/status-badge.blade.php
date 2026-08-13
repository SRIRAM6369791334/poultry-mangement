@props(['status' => null, 'labels' => null])

@php
    $labels = $labels ?? [];
    $label = $labels[$status] ?? ucwords(str_replace('_', ' ', (string) $status));

    $colors = [
        'active' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
        'inactive' => 'bg-gray-100 text-gray-600 ring-gray-500/20',
        'suspended' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'empty' => 'bg-gray-100 text-gray-600 ring-gray-500/20',
        'occupied' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
        'maintenance' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'draft' => 'bg-gray-100 text-gray-600 ring-gray-500/20',
        'placed' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
        'active_batch' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
        'partially_depleted' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'closed' => 'bg-slate-100 text-slate-600 ring-slate-500/20',
        'critical' => 'bg-red-50 text-red-700 ring-red-600/20',
        'high' => 'bg-orange-50 text-orange-700 ring-orange-600/20',
        'medium' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'low' => 'bg-gray-100 text-gray-600 ring-gray-500/20',
    ];
@endphp

<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium ring-1 ring-inset {{ $colors[$status] ?? 'bg-gray-100 text-gray-600 ring-gray-500/20' }}">
    {{ $label }}
</span>
