<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Support\PermissionRegistry;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()->hasPermissionTo('role.view') || auth()->user()->isSuperAdmin(), 403);

        return view('roles.index', [
            'roles' => Role::query()->forTenant()->withCount('permissions')->orderBy('name')->get(),
        ]);
    }

    public function edit(Role $role)
    {
        abort_unless(auth()->user()->hasPermissionTo('role.update') || auth()->user()->isSuperAdmin(), 403);
        abort_unless($this->isEditable($role), 403);

        return view('roles.edit', [
            'role' => $role,
            'modules' => PermissionRegistry::MODULES,
            'actions' => PermissionRegistry::ACTIONS,
            'permissionsByModule' => $this->groupPermissions($role),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        abort_unless(auth()->user()->hasPermissionTo('role.update') || auth()->user()->isSuperAdmin(), 403);
        abort_unless($this->isEditable($role), 403);

        $data = $request->validate([
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['string'],
        ]);

        $role->syncPermissions($data['permissions'] ?? []);

        return redirect()->route('roles.edit', $role)->with('success', 'Role permissions updated.');
    }

    private function isEditable(Role $role): bool
    {
        return auth()->user()->isSuperAdmin()
            ? true
            : $role->organization_id === tenant_id();
    }

    private function groupPermissions(Role $role): array
    {
        $groups = [];
        $assigned = $role->permissions->pluck('name')->all();

        foreach (PermissionRegistry::MODULES as $module) {
            foreach (PermissionRegistry::ACTIONS as $action) {
                $name = "{$module}.{$action}";
                $groups[$module][$action] = in_array($name, $assigned, true);
            }
        }

        return $groups;
    }
}