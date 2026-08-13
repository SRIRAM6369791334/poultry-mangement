<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Support\PermissionRegistry;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = PermissionRegistry::all();

        foreach ($permissions as $permissionName) {
            Permission::findOrCreate($permissionName, 'web');
        }

        $roles = array_keys(PermissionRegistry::ROLE_PERMISSIONS);
        $roles[] = PermissionRegistry::ROLE_SYSTEM;

        foreach ($roles as $roleName) {
            $role = Role::findOrCreate($roleName, 'web');
            $role->syncPermissions(PermissionRegistry::resolve($roleName));
        }
    }
}