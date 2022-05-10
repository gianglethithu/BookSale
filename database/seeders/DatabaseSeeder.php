<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // UserSeeder::class,
            AuthorSeeder::class,
            BookAuthorSeeder::class,
            BookPhotoSeeder::class,
            BookSeeder::class,
            BookStoreSeeder::class,
            CategorySeeder::class,
            CustomerSeeder::class,
            EmployeeSeeder::class,
            GroupSeeder::class,
            OrderItemSeeder::class,
            OrderSeeder::class,
            OrderVoucherSeeder::class,
            PublisherSeeder::class,
            StoreSeeder::class,
            VoucherSeeder::class
        ]);
    }
}
