<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "username" => $this->faker->userName(),
            "password" =>
                '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "worker_id" => $this->faker->unique()->numberBetween(1, 30),
            "remember_token" => Str::random(10),
            "created_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "updated_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "deleted_at" => null,
        ];
    }
}
