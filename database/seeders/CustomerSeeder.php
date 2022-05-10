<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 30; $i++) {
            Customer::create([
                'name' => $faker->name,
                'address' =>$faker->address,
                'phone' => $faker->phoneNumber,
                'credit' => random_int(100000000, 999999999)
            ]);
        }
    }
}
