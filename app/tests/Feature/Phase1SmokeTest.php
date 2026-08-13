<?php

namespace Tests\Feature;

use App\Models\Breed;
use App\Models\BreedType;
use App\Models\Company;
use App\Models\Farm;
use App\Models\FeedType;
use App\Models\Organization;
use App\Models\Shed;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Phase1SmokeTest extends TestCase
{
    use RefreshDatabase;

    private Organization $organization;

    private User $owner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->organization = Organization::where('subdomain', 'murugan')->firstOrFail();
        $this->owner = User::where('email', 'owner@muruganpoultry.com')->firstOrFail();
        $this->actingAs($this->owner);

        app(\App\Services\TenantService::class)->set($this->organization);
    }

    public function test_dashboard_renders(): void
    {
        $this->get(route('dashboard'))->assertOk()->assertSee('Dashboard');
    }

    public function test_company_crud_pages_render(): void
    {
        $this->get(route('companies.index'))->assertOk();
        $this->get(route('companies.create'))->assertOk();

        $company = Company::create([
            'organization_id' => $this->organization->id,
            'name' => 'Test Company',
            'code' => 'TC-1',
            'status' => 'active',
        ]);

        $this->get(route('companies.edit', $company))->assertOk();

        $this->put(route('companies.update', $company), [
            'name' => 'Test Company 2',
            'status' => 'active',
        ])->assertSessionHasNoErrors();

        $this->assertDatabaseHas('companies', ['id' => $company->id, 'name' => 'Test Company 2']);
    }

    public function test_farm_and_shed_crud_pages_render(): void
    {
        $this->get(route('farms.index'))->assertOk();
        $this->get(route('farms.create'))->assertOk();

        $farm = Farm::create([
            'organization_id' => $this->organization->id,
            'name' => 'Green Valley Farm',
            'code' => 'GV-01',
            'farm_type' => 'broiler',
            'ownership' => 'owned',
            'status' => 'active',
        ]);

        $this->get(route('farms.edit', $farm))->assertOk();

        $this->get(route('sheds.index', ['farm_id' => $farm->id]))->assertOk();
        $this->get(route('sheds.create', ['farm_id' => $farm->id]))->assertOk();

        $shed = Shed::create([
            'organization_id' => $this->organization->id,
            'farm_id' => $farm->id,
            'name' => 'Shed A',
            'length_m' => 60,
            'width_m' => 12,
            'area_sqm' => 720,
            'max_capacity' => 10000,
            'housing_type' => 'deep_litter',
            'status' => 'empty',
        ]);

        $this->get(route('sheds.edit', $shed))->assertOk();
        $this->put(route('sheds.update', $shed), [
            'farm_id' => $farm->id,
            'name' => 'Shed B',
            'housing_type' => 'deep_litter',
            'status' => 'empty',
        ])->assertSessionHasNoErrors();
    }

    public function test_master_data_pages_render(): void
    {
        foreach (['breed-types', 'breeds', 'feed-types', 'medicine-types', 'vaccine-types', 'disease-types', 'uoms'] as $path) {
            $this->get(route($path.'.index'))->assertOk();
            $this->get(route($path.'.create'))->assertOk();
        }

        $breedType = BreedType::where('organization_id', $this->organization->id)->first();
        $this->get(route('breed-types.edit', $breedType))->assertOk();

        $breed = Breed::where('organization_id', $this->organization->id)->first();
        $this->get(route('breeds.edit', $breed))->assertOk();

        $feedType = FeedType::where('organization_id', $this->organization->id)->first();
        $this->get(route('feed-types.edit', $feedType))->assertOk();
    }

    public function test_admin_pages_render(): void
    {
        $this->get(route('users.index'))->assertOk();
        $this->get(route('users.create'))->assertOk();
        $this->get(route('roles.index'))->assertOk();

        $role = \App\Models\Role::where('name', 'Farm Supervisor')->firstOrFail();
        $this->get(route('roles.edit', $role))->assertOk();

        $this->get(route('organization.edit'))->assertOk();
    }

    public function test_validation_blocks_duplicate_farm_code(): void
    {
        Farm::create([
            'organization_id' => $this->organization->id,
            'name' => 'Farm One',
            'code' => 'DUP-01',
            'farm_type' => 'broiler',
            'ownership' => 'owned',
            'status' => 'active',
        ]);

        $this->post(route('farms.store'), [
            'name' => 'Farm Two',
            'code' => 'DUP-01',
            'farm_type' => 'broiler',
            'ownership' => 'owned',
            'status' => 'active',
        ])->assertSessionHasErrors('code');
    }
}