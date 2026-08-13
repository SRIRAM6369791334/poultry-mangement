namespace Database\Factories;

use App\Models\Breed;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreedFactory extends Factory
{
    protected $model = Breed::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'breed_type_id' => BreedTypeFactory::new(),
            'name' => fake()->randomElement(['Cobb 500', 'Ross 308', 'Ross 708', 'Vencobb 400']),
            'code' => 'BRD-'.fake()->unique()->numberBetween(100, 999),
            'standard_weight_kg' => fake()->randomFloat(3, 1.5, 2.5),
            'standard_fcr' => fake()->randomFloat(3, 1.4, 1.8),
            'target_days' => fake()->randomElement([35, 38, 42, 45]),
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
