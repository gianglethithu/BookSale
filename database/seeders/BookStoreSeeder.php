<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookStore;

class BookStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookStore::truncate();
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 200; $i++) {
            BookStore::create([
                'store_id' => random_int(2,11),
                'book_id' => random_int(1,100),
                'number_in_stock' => random_int(1,30)
            ]);
        }
    }
}
