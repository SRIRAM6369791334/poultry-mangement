<?php

namespace App\Http\Middleware;

use App\Models\Organization;
use App\Services\TenantService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $tenantService = app(TenantService::class);

        if ($user !== null) {
            $org = $this->resolveOrganization($request, $user);

            if ($org !== null) {
                $tenantService->set($org);
                session(['current_organization_id' => $org->id]);
            }
        }

        return $next($request);
    }

    private function resolveOrganization(Request $request, $user): ?Organization
    {
        $sessionOrgId = session('current_organization_id');

        if ($sessionOrgId && $user->organization_id === $sessionOrgId) {
            return Organization::query()->find($sessionOrgId);
        }

        return $user->organization;
    }
}