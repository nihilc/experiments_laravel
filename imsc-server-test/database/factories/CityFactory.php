<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->city,
            "created_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "updated_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "deleted_at" => null,
        ];
    }
}
