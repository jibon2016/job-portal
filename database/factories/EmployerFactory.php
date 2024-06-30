<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_name' => fake()->name,
            'company_name' => fake()->company,
            'website' => fake()->url,
            'logo' => fake()->imageUrl,
            'user_id' => User::factory(),
        ];
    }
}
