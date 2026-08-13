<?php

namespace Database\Factories;

use App\Models\FeedType;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FeedType>
 */
class FeedTypeFactory extends Factory
{
    protected $model = FeedType::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->randomElement(['Pre-Starter', 'Starter', 'Grower', 'Finisher']),
            'code' => strtoupper(fake()->lexify('??')).fake()->numberBetween(1, 9),
            'nutritional_info' => fake()->sentence(),
            'protein_percent' => fake()->randomFloat(2, 18, 24),
            'energy_kcal' => fake()->randomFloat(2, 2800, 3200),
            'recommended_start_day' => 0,
            'recommended_end_day' => 42,
        ];
    }

    public function forOrganization(Organization $organization): static
    {
        return $this->state(fn (array $attributes) => [
            'organization_id' => $organization->id,
        ]);
    }
}