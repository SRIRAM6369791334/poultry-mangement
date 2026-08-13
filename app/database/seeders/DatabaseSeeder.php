<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleAndPermissionSeeder::class);

        $organization = Organization::updateOrCreate(
            ['subdomain' => 'murugan'],
            [
                'name' => 'Sri Murugan Poultry & Agro Group',
                'contact_email' => 'admin@muruganpoultry.com',
                'phone' => '+91 98765 43210',
                'address' => 'Coimbatore, Tamil Nadu, India',
                'default_currency' => 'INR',
                'plan' => 'professional',
            ]
        );

        $this->callWith(MasterDataSeeder::class, ['organization' => $organization]);

        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@poultryerp.test'],
            [
                'name' => 'Platform Super Admin',
                'password' => 'password',
            ]
        );
        $superAdmin->syncRoles('Super Admin');

        $owner = User::firstOrCreate(
            ['email' => 'owner@muruganpoultry.com'],
            [
                'name' => 'Organization Owner',
                'password' => 'password',
                'organization_id' => $organization->id,
            ]
        );
        $owner->syncRoles('Organization Owner');

        $farmManager = User::firstOrCreate(
            ['email' => 'manager@muruganpoultry.com'],
            [
                'name' => 'Farm Manager',
                'password' => 'password',
                'organization_id' => $organization->id,
            ]
        );
        $farmManager->syncRoles('Farm Manager');

        $supervisor = User::firstOrCreate(
            ['email' => 'supervisor@muruganpoultry.com'],
            [
                'name' => 'Farm Supervisor',
                'password' => 'password',
                'organization_id' => $organization->id,
            ]
        );
        $supervisor->syncRoles('Farm Supervisor');

        $worker = User::firstOrCreate(
            ['email' => 'worker@muruganpoultry.com'],
            [
                'name' => 'Farm Worker',
                'password' => 'password',
                'organization_id' => $organization->id,
            ]
        );
        $worker->syncRoles('Farm Worker');
    }
}