<?php

namespace App\Services;

use App\Models\Organization;

class TenantService
{
    protected ?Organization $tenant = null;

    public function set(?Organization $tenant): void
    {
        $this->tenant = $tenant;
    }

    public function current(): ?Organization
    {
        return $this->tenant;
    }

    public function id(): ?string
    {
        return $this->tenant?->id;
    }
}