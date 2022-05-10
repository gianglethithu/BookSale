<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++) {
            Category::create([
                'name' => $faker->title,
            ]);
        }
    }
}
