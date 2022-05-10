<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => random_int(1,20),
            'title' => $this->faker->sentence,
            'avatar' => $this->faker->imageUrl,
            'rate' => 0,
            'publisher_id' => random_int(1,10),
            'price' =>random_int(10000, 500000),
            'number_stock' => 0,
            'number_sold' =>0
        ];
    }
}
