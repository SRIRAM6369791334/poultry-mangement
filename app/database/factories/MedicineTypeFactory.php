<?php

namespace Database\Factories;

use App\Models\MedicineType;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MedicineType>
 */
class MedicineTypeFactory extends Factory
{
    protected $model = MedicineType::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->randomElement(['Amoxicillin', 'Enrofloxacin', 'Tylosin', 'Coccidiostat']),
            'active_ingredient' => fake()->word(),
            'withdrawal_period_days' => fake()->randomElement([0, 3, 5, 7, 14]),
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