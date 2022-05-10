<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderVoucher;

class OrderVoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderVoucher::truncate();
        // $faker = \Faker\Factory::create();

        for ($i=0; $i < 50; $i++) {
            OrderVoucher::create([
                'order_id' => random_int(1,200),
                'voucher_id' => random_int(1, 10)
            ]);
        }
    }
}
