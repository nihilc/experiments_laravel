<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
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
        Company::factory(5)->create();
        City::factory(5)->create();
        Worker::factory(30)->create();
        Role::create(["name" => "Admin"]);
        Role::create(["name" => "Inventory"]);
        User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) {
                $user->roles()->attach(Role::inRandomOrder()->first());
            });
        Category::factory(10)->create();
    }
}
