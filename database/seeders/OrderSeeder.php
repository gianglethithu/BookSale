<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 200; $i++) {
            Order::create([
                'employee_id' => random_int(1,20),
                'customer_id' => random_int(1,30),
                'deliver_cost' => random_int(10000, 50000),
                'pay_method' => 'credit'||'cast',
            ]);
        }
    }
}
