<?php

namespace Database\Factories;

use App\Models\Farm;
use App\Models\Organization;
use App\Models\Shed;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Shed>
 */
class ShedFactory extends Factory
{
    use TenantFactory;

    protected $model = Shed::class;

    public function definition(): array
    {
        $length = fake()->numberBetween(30, 120);
        $width = fake()->numberBetween(8, 15);

        return [
            'organization_id' => Organization::factory(),
            'farm_id' => Farm::factory(),
            'name' => 'Shed '.fake()->randomElement(['A', 'B', 'C', '1', '2', '3']),
            'length_m' => $length,
            'width_m' => $width,
            'area_sqm' => $length * $width,
            'max_capacity' => $length * $width * fake()->numberBetween(12, 17),
            'housing_type' => fake()->randomElement(['deep_litter', 'open_sided', 'environmentally_controlled', 'cages']),
            'status' => Shed::STATUS_EMPTY,
            'fans_count' => fake()->numberBetween(4, 12),
            'feeders_count' => fake()->numberBetween(20, 80),
            'drinkers_count' => fake()->numberBetween(30, 120),
            'heaters_count' => fake()->numberBetween(2, 10),
        ];
    }

    public function occupied(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => Shed::STATUS_OCCUPIED,
        ]);
    }
}