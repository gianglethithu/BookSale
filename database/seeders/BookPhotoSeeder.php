<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookPhoto;

class BookPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookPhoto::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 400; $i++) {
            BookPhoto::create([
                'book_id' => random_int(1,100),
                'photo' => $faker->imageUrl,
            ]);
        }
    }
}
