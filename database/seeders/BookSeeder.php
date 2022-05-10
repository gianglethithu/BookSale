<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 100; $i++) {
            Book::create([
                'category_id' => random_int(1,20),
                'title' => $faker->sentence,
                'avatar' => $faker->imageUrl,
                'publisher_id' => random_int(1,10),
                'price' =>random_int(10000, 500000),
            ]);
        }
    }
}
