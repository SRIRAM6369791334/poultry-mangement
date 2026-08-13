<?php

use App\Services\TenantService;

if (! function_exists('tenant_id')) {
    function tenant_id(): ?string
    {
        return app(TenantService::class)->id();
    }
}

if (! function_exists('tenant')) {
    function tenant(): ?\App\Models\Organization
    {
        return app(TenantService::class)->current();
    }
}