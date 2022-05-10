<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::truncate();

       $faker = \Faker\Factory::create();

       for ($i = 0; $i < 20; $i++) {
           Author::create([
               'name' => $faker->userName,
               'avatar' => $faker->imageUrl,
               'email' =>$faker->email
           ]);
       }
    }
}
