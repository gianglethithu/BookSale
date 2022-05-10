<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {
            Publisher::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
