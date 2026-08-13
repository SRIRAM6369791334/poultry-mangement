<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    use TenantFactory;

    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => fake()->company(),
            'code' => 'CMP-'.fake()->unique()->numberBetween(100, 999),
            'registration_number' => fake()->numerify('REG-########'),
            'tax_id' => fake()->numerify('GSTIN###########'),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'base_currency' => 'INR',
            'status' => 'active',
        ];
    }
}