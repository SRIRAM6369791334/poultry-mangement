<?php

namespace App\Providers;

use App\Models\Role;
use App\Services\TenantService;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\PermissionRegistrar;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TenantService::class);
    }

    public function boot(): void
    {
        $this->app->resolving(PermissionRegistrar::class, function (PermissionRegistrar $registrar) {
            $tenantId = app(TenantService::class)->id();

            if ($tenantId !== null) {
                config(['permission.cache.key' => 'spatie.permission.cache.'.$tenantId]);
            }
        });
    }
}