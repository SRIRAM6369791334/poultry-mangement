<?php

namespace Database\Factories;

use App\Models\DiseaseType;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DiseaseType>
 */
class DiseaseTypeFactory extends Factory
{
    protected $model = DiseaseType::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->randomElement(['Ascites', 'Newcastle Disease', 'IBD (Gumboro)', 'Coccidiosis', 'SDS (Flip-over)']),
            'code' => strtoupper(fake()->lexify('??')).fake()->numberBetween(1, 9),
            'symptoms' => fake()->sentence(),
            'severity' => fake()->randomElement(['low', 'medium', 'high', 'critical']),
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