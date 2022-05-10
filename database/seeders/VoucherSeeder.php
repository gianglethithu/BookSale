<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {
            Voucher::create([
                'name' => $faker->name.' voucher',
                'discount' => random_int(1000,30000),
                'time_start' => $faker->dateTimeThisMonth('now'),
                'time_end' =>$faker->dateTimeThisMonth
            ]);
        }
    }
}
