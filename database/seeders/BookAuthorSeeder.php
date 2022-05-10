<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookAuthor;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookAuthor::truncate();
        // $faker = \Faker\Factory::create();

        for ($i=0; $i < 200; $i++) {
            BookAuthor::create([
                'book_id' => random_int(1,100),
                'author_id' => random_int(1,20)
            ]);
        }
    }
}
