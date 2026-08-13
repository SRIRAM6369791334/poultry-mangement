<?php

namespace App\Support;

class PermissionRegistry
{
    public const MODULES = [
        'organization', 'company', 'farm', 'shed',
        'breed', 'breed_type', 'feed_type', 'medicine_type', 'vaccine_type',
        'disease_type', 'uom', 'currency', 'equipment', 'warehouse',
        'user', 'role', 'settings', 'reports', 'audit',
        'batch', 'placement', 'mortality', 'feed_consumption', 'weight',
        'vaccination', 'medication', 'depletion',
    ];

    public const ACTIONS = ['view', 'create', 'update', 'delete', 'approve'];

    public const ROLE_SYSTEM = 'Super Admin';
    public const ROLE_SYSTEM_GUARD = 'web';

    /**
     * Role => [module => actions]
     */
    public const ROLE_PERMISSIONS = [
        'Organization Owner' => [
            'organization' => ['view', 'update'],
            'company' => ['view', 'create', 'update', 'delete'],
            'farm' => ['view', 'create', 'update', 'delete'],
            'shed' => ['view', 'create', 'update', 'delete'],
            'breed' => ['view', 'create', 'update', 'delete'],
            'breed_type' => ['view', 'create', 'update', 'delete'],
            'feed_type' => ['view', 'create', 'update', 'delete'],
            'medicine_type' => ['view', 'create', 'update', 'delete'],
            'vaccine_type' => ['view', 'create', 'update', 'delete'],
            'disease_type' => ['view', 'create', 'update', 'delete'],
            'uom' => ['view', 'create', 'update', 'delete'],
            'currency' => ['view', 'create', 'update', 'delete'],
            'equipment' => ['view', 'create', 'update', 'delete'],
            'warehouse' => ['view', 'create', 'update', 'delete'],
            'user' => ['view', 'create', 'update', 'delete'],
            'role' => ['view', 'create', 'update', 'delete'],
            'settings' => ['view', 'update'],
            'reports' => ['view'],
            'audit' => ['view'],
            'batch' => ['view', 'create', 'update', 'delete', 'approve'],
            'placement' => ['view', 'create', 'update'],
            'mortality' => ['view', 'create', 'update', 'delete', 'approve'],
            'feed_consumption' => ['view', 'create', 'update', 'delete'],
            'weight' => ['view', 'create', 'update', 'delete'],
            'vaccination' => ['view', 'create', 'update', 'delete'],
            'medication' => ['view', 'create', 'update', 'delete'],
            'depletion' => ['view', 'create', 'update', 'approve'],
        ],
        'Company Admin' => [
            'organization' => ['view'],
            'company' => ['view', 'create', 'update', 'delete'],
            'farm' => ['view', 'create', 'update', 'delete'],
            'shed' => ['view', 'create', 'update', 'delete'],
            'breed' => ['view', 'create', 'update'],
            'breed_type' => ['view', 'create', 'update'],
            'feed_type' => ['view', 'create', 'update'],
            'medicine_type' => ['view', 'create', 'update'],
            'vaccine_type' => ['view', 'create', 'update'],
            'disease_type' => ['view', 'create', 'update'],
            'uom' => ['view', 'create', 'update'],
            'currency' => ['view', 'create', 'update'],
            'equipment' => ['view', 'create', 'update', 'delete'],
            'warehouse' => ['view', 'create', 'update', 'delete'],
            'user' => ['view', 'create', 'update', 'delete'],
            'role' => ['view', 'create', 'update', 'delete'],
            'settings' => ['view', 'update'],
            'reports' => ['view'],
            'audit' => ['view'],
            'batch' => ['view', 'create', 'update', 'approve'],
            'placement' => ['view', 'create', 'update'],
            'mortality' => ['view', 'create', 'update', 'approve'],
            'feed_consumption' => ['view', 'create', 'update'],
            'weight' => ['view', 'create', 'update'],
            'vaccination' => ['view', 'create', 'update'],
            'medication' => ['view', 'create', 'update'],
            'depletion' => ['view', 'create', 'approve'],
        ],
        'Farm Manager' => [
            'farm' => ['view', 'create', 'update'],
            'shed' => ['view', 'create', 'update'],
            'breed' => ['view'],
            'feed_type' => ['view'],
            'medicine_type' => ['view'],
            'vaccine_type' => ['view'],
            'disease_type' => ['view'],
            'equipment' => ['view', 'create', 'update'],
            'user' => ['view', 'create', 'update'],
            'reports' => ['view'],
            'batch' => ['view', 'create', 'update', 'approve'],
            'placement' => ['view', 'create', 'update'],
            'mortality' => ['view', 'create', 'update', 'approve'],
            'feed_consumption' => ['view', 'create', 'update'],
            'weight' => ['view', 'create', 'update'],
            'vaccination' => ['view', 'create', 'update'],
            'medication' => ['view', 'create', 'update'],
            'depletion' => ['view', 'create', 'approve'],
        ],
        'Farm Supervisor' => [
            'farm' => ['view'],
            'shed' => ['view'],
            'breed' => ['view'],
            'feed_type' => ['view'],
            'disease_type' => ['view'],
            'batch' => ['view', 'update'],
            'placement' => ['view', 'create'],
            'mortality' => ['view', 'create', 'update'],
            'feed_consumption' => ['view', 'create', 'update'],
            'weight' => ['view', 'create'],
            'vaccination' => ['view', 'create'],
            'medication' => ['view', 'create'],
            'depletion' => ['view'],
        ],
        'Farm Worker' => [
            'batch' => ['view'],
            'mortality' => ['view', 'create'],
            'feed_consumption' => ['view', 'create'],
            'weight' => ['view', 'create'],
        ],
        'Veterinarian' => [
            'batch' => ['view'],
            'mortality' => ['view', 'create', 'update'],
            'disease_type' => ['view', 'create', 'update'],
            'vaccination' => ['view', 'create', 'update', 'delete'],
            'medication' => ['view', 'create', 'update', 'delete'],
            'reports' => ['view'],
        ],
        'Feed Manager' => [
            'feed_type' => ['view', 'create', 'update'],
            'warehouse' => ['view', 'create', 'update'],
            'feed_consumption' => ['view', 'create', 'update'],
            'reports' => ['view'],
        ],
        'Inventory Manager' => [
            'warehouse' => ['view', 'create', 'update', 'delete'],
            'equipment' => ['view', 'create', 'update'],
            'reports' => ['view'],
        ],
        'Purchase Manager' => [
            'warehouse' => ['view'],
            'reports' => ['view'],
        ],
        'Sales Manager' => [
            'reports' => ['view'],
        ],
        'Accountant' => [
            'reports' => ['view'],
            'audit' => ['view'],
        ],
        'HR Manager' => [
            'user' => ['view'],
            'reports' => ['view'],
        ],
        'Driver' => [],
        'Customer' => [],
        'Supplier' => [],
        'Auditor' => [
            'organization' => ['view'],
            'company' => ['view'],
            'farm' => ['view'],
            'shed' => ['view'],
            'batch' => ['view'],
            'reports' => ['view'],
            'audit' => ['view'],
        ],
    ];

    public static function all(): array
    {
        $permissions = [];

        foreach (self::MODULES as $module) {
            foreach (self::ACTIONS as $action) {
                $permissions[] = "{$module}.{$action}";
            }
        }

        return $permissions;
    }

    public static function resolve(string $role): array
    {
        if ($role === self::ROLE_SYSTEM) {
            return self::all();
        }

        $map = self::ROLE_PERMISSIONS[$role] ?? [];

        $resolved = [];
        foreach ($map as $module => $actions) {
            foreach ($actions as $action) {
                $resolved[] = "{$module}.{$action}";
            }
        }

        return $resolved;
    }
}