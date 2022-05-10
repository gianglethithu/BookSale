<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 300; $i++) {
            OrderItem::create([
                'order_id' => random_int(2,200),
                'book_id' => random_int(1,100),
                'quantity' => random_int(1,10),
            ]);
        }
    }
}
