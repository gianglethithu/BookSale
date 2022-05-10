<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 30; $i++) {
            Store::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'area' => $faker->streetAddress,
                'manager_id' => random_int(1,20)
            ]);
        }
    }
}
