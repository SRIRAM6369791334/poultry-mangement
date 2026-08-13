<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Organization>
 */
class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company().' Poultry',
            'subdomain' => fake()->unique()->slug(2),
            'contact_email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'default_currency' => 'INR',
            'status' => 'active',
            'plan' => 'professional',
        ];
    }
}