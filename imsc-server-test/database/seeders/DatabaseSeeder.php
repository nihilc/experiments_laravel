<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Assignment;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Item;
use Database\Factories\AttributeFactory;
use Database\Factories\CategoryFactory;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\City;
use App\Models\Worker;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // TODO make relationships in right way
        Company::factory(5)->create();
        City::factory(5)->create();
        Worker::factory(30)->create();
        Role::create(["name" => "Admin"]);
        Role::create(["name" => "Inventory"]);
        User::factory(5)
            ->create()
            ->each(function ($user) {
                $user->roles()->attach(Role::inRandomOrder()->first());
            });
        Category::factory(10)
            ->has(Attribute::factory()->count(4))
            ->create();

        Item::factory(10)
            ->recycle(Category::all())
            ->recycle(City::all())
            ->recycle(Company::all())
            ->hasAttached(Attribute::all(), ["value" => fake()->word()])
            ->create();

        Assignment::factory(10)
            ->recycle(User::all())
            ->recycle(Worker::all())
            ->hasAttached(Item::all(), [
                "assign_note" => fake()->sentence(),
                "return_note" => fake()->sentence(),
                "return_date" => now(),
            ])
            ->create();
    }
}
