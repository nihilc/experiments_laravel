<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attribute>
 */
class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->randomElement([
                "mark",
                "model",
                "serial",
                "imei",
                "storage",
                "storage type",
                "ram",
                "ram type",
                "cpu",
                "size",
                "color",
                "description",
            ]),
        ];
    }
}
