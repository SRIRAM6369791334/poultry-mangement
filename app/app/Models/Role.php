<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [
        'name',
        'guard_name',
        'organization_id',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function scopeForTenant(Builder $query, ?string $organizationId = null): Builder
    {
        $tenantId = $organizationId ?? app(\App\Services\TenantService::class)->id();

        if ($tenantId !== null) {
            return $query->where(fn (Builder $q) => $q->whereNull('organization_id')->orWhere('organization_id', $tenantId));
        }

        return $query->whereNull('organization_id');
    }
}