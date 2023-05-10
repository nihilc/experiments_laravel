<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "icard" => $this->faker->regexify("[1-9]{10}"),
            "fname" => $this->faker->firstName(),
            "mname" => $this->faker->firstName(),
            "lname" => $this->faker->lastName(),
            "mlname" => $this->faker->lastName(),
            "photo" => $this->faker->imageUrl(400, 400),
            "phone" => $this->faker->phoneNumber(),
            "email" => $this->faker->safeEmail(),
            "title" => $this->faker->jobTitle(),
            "company_id" => $this->faker->numberBetween(1, 5),
            "city_id" => $this->faker->numberBetween(1, 5),
            "created_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "updated_at" => $this->faker->dateTimeBetween("-1 years", "now"),
            "deleted_at" => null,
        ];
    }
}
