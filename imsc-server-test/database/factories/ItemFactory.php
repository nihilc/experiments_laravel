<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "cod" => $this->faker->unique()->numberBetween(1, 500),
            "state" => $this->faker->randomElement([
                "Active",
                "Inactive",
                "Deprecated",
            ]),
            "image" => $this->faker->imageUrl(300, 300),
            "company_id" => Company::factory(),
            "city_id" => City::factory(),
            "category_id" => Category::factory(),
        ];
    }
}
