@php
    $user = auth()->user();
    $can = fn (string $permission) => $user->isSuperAdmin() || $user->hasPermissionTo($permission);
@endphp

<div class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-slate-300 flex flex-col">
    <div class="flex items-center gap-3 px-6 h-16 border-b border-slate-800">
        <svg class="h-8 w-8 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-6.5-4.5-6.5-9.5a6.5 6.5 0 1 1 13 0c0 5-6.5 9.5-6.5 9.5z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 11.5h1.5L11.5 9l1.5 4h1.5"/>
        </svg>
        <div class="min-w-0">
            <div class="text-sm font-semibold text-white truncate">{{ config('app.name') }}</div>
            @if (tenant())
                <div class="text-xs text-slate-400 truncate">{{ tenant()->name }}</div>
            @endif
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-6 text-sm">
        <div class="space-y-1">
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="M3 12l9-9 9 9M5 10v10h14V10">
                Dashboard
            </x-sidebar-link>
        </div>

        @if ($can('farm.view') || $can('shed.view') || $can('company.view'))
            <div>
                <div class="px-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Farm Management</div>
                <div class="space-y-1">
                    @if ($can('farm.view'))
                        <x-sidebar-link :href="route('farms.index')" :active="request()->routeIs('farms.*')" icon="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6">
                            Farms
                        </x-sidebar-link>
                    @endif
                    @if ($can('shed.view'))
                        <x-sidebar-link :href="route('sheds.index')" :active="request()->routeIs('sheds.*')" icon="M4 21V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16M4 9h16M9 21v-4h6v4">
                            Sheds
                        </x-sidebar-link>
                    @endif
                    @if ($can('company.view'))
                        <x-sidebar-link :href="route('companies.index')" :active="request()->routeIs('companies.*')" icon="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5m-4 0h4">
                            Companies
                        </x-sidebar-link>
                    @endif
                </div>
            </div>
        @endif

        <div>
            <div class="px-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Master Data</div>
            <div class="space-y-1">
                @if ($can('breed.view'))
                    <x-sidebar-link :href="route('breeds.index')" :active="request()->routeIs('breeds.*')" icon="M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z">
                        Breeds
                    </x-sidebar-link>
                @endif
                @if ($can('feed_type.view'))
                    <x-sidebar-link :href="route('feed-types.index')" :active="request()->routeIs('feed-types.*')" icon="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                        Feed Types
                    </x-sidebar-link>
                @endif
                @if ($can('medicine_type.view'))
                    <x-sidebar-link :href="route('medicine-types.index')" :active="request()->routeIs('medicine-types.*')" icon="M12 6V4m0 2a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m-6 8a2 2 0 1 0 0-4m0 4a2 2 0 1 1 0-4m0 4v2m0-6V4m0 6h10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m0-6V4">
                        Medicines
                    </x-sidebar-link>
                @endif
                @if ($can('vaccine_type.view'))
                    <x-sidebar-link :href="route('vaccine-types.index')" :active="request()->routeIs('vaccine-types.*')" icon="M19.428 15.428a2 2 0 0 0-1.022-.547l-2.387-.477a6 6 0 0 0-3.86.517l-.318.158a6 6 0 0 1-3.86.517L6.05 15.21a2 2 0 0 0-1.806.547M8 4h8l-1 1v5.172a2 2 0 0 0 .586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 0 0 9 10.172V5L8 4z">
                        Vaccines
                    </x-sidebar-link>
                @endif
                @if ($can('disease_type.view'))
                    <x-sidebar-link :href="route('disease-types.index')" :active="request()->routeIs('disease-types.*')" icon="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z">
                        Mortality Causes
                    </x-sidebar-link>
                @endif
                @if ($can('uom.view'))
                    <x-sidebar-link :href="route('uoms.index')" :active="request()->routeIs('uoms.*')" icon="M3 6h18M3 12h18M3 18h18">
                        Units (UoM)
                    </x-sidebar-link>
                @endif
            </div>
        </div>

        @if ($can('user.view') || $can('role.view') || $can('settings.view'))
            <div>
                <div class="px-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500">Administration</div>
                <div class="space-y-1">
                    @if ($can('user.view'))
                        <x-sidebar-link :href="route('users.index')" :active="request()->routeIs('users.*')" icon="M12 4.354a4 4 0 1 1 0 5.292M15 21H3v-1a6 6 0 0 1 12 0v1zm0 0h6v-1a6 6 0 0 0-9-5.197M13 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0z">
                            Users
                        </x-sidebar-link>
                    @endif
                    @if ($can('role.view'))
                        <x-sidebar-link :href="route('roles.index')" :active="request()->routeIs('roles.*')" icon="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065zM15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z">
                            Roles & Permissions
                        </x-sidebar-link>
                    @endif
                    @if ($can('settings.view'))
                        <x-sidebar-link :href="route('organization.edit')" :active="request()->routeIs('organization.*')" icon="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                            Organization Settings
                        </x-sidebar-link>
                    @endif
                </div>
            </div>
        @endif
    </nav>

    <div class="border-t border-slate-800 p-3">
        <div class="flex items-center gap-3 px-3 py-2">
            <div class="h-9 w-9 rounded-full bg-emerald-600 flex items-center justify-center text-white text-sm font-semibold shrink-0">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="min-w-0 flex-1">
                <div class="text-sm font-medium text-white truncate">{{ $user->name }}</div>
                <div class="text-xs text-slate-400 truncate">{{ $user->roles->pluck('name')->implode(', ') ?: 'No role' }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-white" title="Logout">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
