<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->company,
            "acronym" => $this->faker->unique()->regexify("[A-Z]{3}"),
            "logo" => $this->faker->imageUrl(200, 200),
            "created_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "updated_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "deleted_at" => null,
        ];
    }
}
