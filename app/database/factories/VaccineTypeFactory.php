<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\VaccineType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VaccineType>
 */
class VaccineTypeFactory extends Factory
{
    protected $model = VaccineType::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->randomElement(['ND+IB Spray', 'IBD (Gumboro)', 'Marek (MD)', 'Lasota']),
            'administration_method' => fake()->randomElement(['spray', 'drinking_water', 'injection', 'eye_drop']),
            'schedule_day' => fake()->randomElement([1, 7, 14, 18, 21]),
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