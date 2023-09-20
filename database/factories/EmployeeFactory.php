<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_code'=> fake()->numberBetween(1000000000, 9999999999),
            'first_name' => fake()->name(),
            'middle_name' => fake()->name(),
            'last_name' => fake()->name(),
            'designation' => Str::random(10),
            'province_lgu_jpo' => Str::random(10),
            'delegation' => Str::random(10),
            'email' => fake()->unique()->safeEmail(),
            'profile_picture' => Str::random(10),
        ];
    }
}
