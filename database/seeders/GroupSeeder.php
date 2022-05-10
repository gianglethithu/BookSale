<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {
            Group::create([
                'name' => $faker->name,
            ]);
        }
    }
}
