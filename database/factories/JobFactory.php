<?php

namespace Database\Factories;

use App\Models\Employer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'job_title' => fake()->jobTitle,
            'company_name' => fake()->company,
            'summary' => fake()->text,
            'description' => fake()->text,
            'requirement' => fake()->text,
            'experience' => fake()->randomElement([1, 2, 3]),
            'deadline' => date('Y-m-d 00:00:00', strtotime("+30 days")),
            'vacancy' => rand(1,5),
            'salary' => fake()->randomElement(['$60,000 USD', '$90,000 USD', '$150,000 USD']),
            'location' => 'Remote',
            'employment_type' => fake()->randomElement(['Full Time', 'Part Time']),
            'company_image' => fake()->url,
            'website' => fake()->url,
            'featured' => false,
        ];
    }
}
