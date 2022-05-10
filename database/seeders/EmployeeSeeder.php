<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++) {
            Employee::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'group_id' => random_int(1,10),
            ]);
        }
    }
}
