<?php

namespace Database\Factories;

use App\Models\BreedType;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BreedType>
 */
class BreedTypeFactory extends Factory
{
    protected $model = BreedType::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->randomElement(['Broiler', 'Layer', 'Breeder']),
            'code' => strtoupper(fake()->lexify('??')).fake()->numberBetween(1, 9),
            'description' => fake()->sentence(),
        ];
    }

    public function forOrganization(Organization $organization): static
    {
        return $this->state(fn (array $attributes) => [
            'organization_id' => $organization->id,
        ]);
    }
}