<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type" => $this->faker->numberBetween(1, 6),
            "date" => $this->faker->dateTimeBetween("-1 years", "now"),
            "note" => $this->faker->sentence(),
            "user_id" => User::factory(),
            "worker_id" => Worker::factory(),
        ];
    }
}
