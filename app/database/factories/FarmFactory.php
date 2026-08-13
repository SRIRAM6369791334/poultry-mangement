<?php

namespace Database\Factories;

use App\Models\Farm;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Farm>
 */
class FarmFactory extends Factory
{
    use TenantFactory;

    protected $model = Farm::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->city().' Farm',
            'code' => 'FRM-'.fake()->unique()->numberBetween(1000, 9999),
            'address' => fake()->address(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'farm_type' => 'broiler',
            'total_capacity' => fake()->numberBetween(5000, 50000),
            'ownership' => 'owned',
            'status' => 'active',
            'region' => fake()->word(),
        ];
    }
}