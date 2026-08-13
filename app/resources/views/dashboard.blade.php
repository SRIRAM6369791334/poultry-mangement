<x-app-layout>
    @php
        $user = auth()->user();
        $can = fn (string $permission) => $user->isSuperAdmin() || $user->hasPermissionTo($permission);
    @endphp

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
        <p class="mt-1 text-sm text-gray-500">{{ now()->format('l, d F Y') }}</p>
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <x-dashboard-card label="Farms" :value="$farmCount" icon="M3 21h18M5 21V7l7-4 7 4v14" color="text-emerald-600" :href="$can('farm.view') ? route('farms.index') : null" />
        <x-dashboard-card label="Sheds" :value="$shedCount" icon="M4 21V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v16" color="text-blue-600" :href="$can('shed.view') ? route('sheds.index') : null" />
        <x-dashboard-card label="Companies" :value="$companyCount" icon="M19 21V5a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v16" color="text-violet-600" :href="$can('company.view') ? route('companies.index') : null" />
        <x-dashboard-card label="Users" :value="$userCount" icon="M12 4.354a4 4 0 1 1 0 5.292" color="text-amber-600" :href="$can('user.view') ? route('users.index') : null" />
    </div>

    <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            @if ($farms->isEmpty())
                <div class="rounded-lg bg-white shadow ring-1 ring-black/5 p-10 text-center">
                    <h3 class="text-lg font-semibold text-gray-900">Welcome to {{ config('app.name') }}</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Register your first farm to start tracking batches, mortality, feed and performance.
                    </p>
                    @if ($can('farm.create'))
                        <a href="{{ route('farms.create') }}" class="mt-4 inline-flex items-center rounded-md bg-emerald-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500">
                            Add your first farm
                        </a>
                    @endif
                </div>
            @else
                @foreach ($farms as $farm)
                    <div class="rounded-lg bg-white shadow ring-1 ring-black/5">
                        <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">{{ $farm->name }}</h3>
                                <p class="text-xs text-gray-500">{{ strtoupper($farm->code) }} · {{ ucwords(str_replace('_', ' ', $farm->farm_type)) }} · {{ $farm->sheds_count }} sheds</p>
                            </div>
                            @if ($can('farm.update'))
                                <a href="{{ route('farms.edit', $farm) }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">Edit</a>
                            @endif
                        </div>

                        <div class="grid grid-cols-3 divide-x divide-gray-100 text-center">
                            <div class="px-4 py-4">
                                <div class="text-2xl font-bold {{ $occupiedSheds > 0 ? 'text-blue-600' : 'text-gray-400' }}">{{ $occupiedSheds }}</div>
                                <div class="text-xs text-gray-500 mt-1">Occupied</div>
                            </div>
                            <div class="px-4 py-4">
                                <div class="text-2xl font-bold {{ $emptySheds > 0 ? 'text-emerald-600' : 'text-gray-400' }}">{{ $emptySheds }}</div>
                                <div class="text-xs text-gray-500 mt-1">Empty</div>
                            </div>
                            <div class="px-4 py-4">
                                <div class="text-2xl font-bold {{ $maintenanceSheds > 0 ? 'text-amber-600' : 'text-gray-400' }}">{{ $maintenanceSheds }}</div>
                                <div class="text-xs text-gray-500 mt-1">Maintenance</div>
                            </div>
                        </div>

                        <div class="px-5 py-3 border-t border-gray-100">
                            @php
                                $statuses = $farm->sheds->groupBy('status');
                            @endphp
                            @if ($farm->sheds->isEmpty())
                                <p class="text-xs text-gray-400">No sheds registered yet.</p>
                            @else
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($farm->sheds as $shed)
                                        <span
                                            title="{{ $shed->name }} — {{ ucwords(str_replace('_', ' ', $shed->status)) }}"
                                            class="inline-flex items-center gap-1.5 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset
                                                {{ match ($shed->status) {
                                                    'occupied' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
                                                    'maintenance' => 'bg-amber-50 text-amber-700 ring-amber-600/20',
                                                    'active' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
                                                    default => 'bg-gray-50 text-gray-600 ring-gray-500/20',
                                                } }}"
                                        >
                                            {{ $shed->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="space-y-6">
            <div class="rounded-lg bg-white shadow ring-1 ring-black/5">
                <div class="px-5 py-4 border-b border-gray-100">
                    <h3 class="text-base font-semibold text-gray-900">Shed Status Overview</h3>
                </div>
                <div class="px-5 py-4 space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Occupied</span>
                        <span class="font-semibold text-blue-600">{{ $occupiedSheds }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Empty</span>
                        <span class="font-semibold text-emerald-600">{{ $emptySheds }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Maintenance</span>
                        <span class="font-semibold text-amber-600">{{ $maintenanceSheds }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Total capacity (birds)</span>
                        <span class="font-semibold text-gray-900">{{ number_format($farms->sum('total_capacity')) }}</span>
                    </div>
                </div>
            </div>

            @if ($recentActivity->isNotEmpty())
                <div class="rounded-lg bg-white shadow ring-1 ring-black/5">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h3 class="text-base font-semibold text-gray-900">Recent Activity</h3>
                    </div>
                    <ul class="divide-y divide-gray-100">
                        @foreach ($recentActivity as $activity)
                            <li class="px-5 py-3 text-sm">
                                <div class="text-gray-700">{{ $activity->description }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ $activity->created_at->diffForHumans() }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
