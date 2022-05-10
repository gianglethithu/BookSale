<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Book;


class BookTest extends TestCase
{
    // use RefreshDatabase;
    public function testsArticlesAreCreatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'category_id' => 2,
            'title' => 'lorem ada',
            'avatar' =>  'https://via.placeholder.com/640x480.png/006699?text=beat',
            'rate' => 0,
            'publisher_id' => 3,
            'price' => 327813,
            'number_stock' => 0,
            'number_sold' =>0
        ];

        $this->json('POST', 'api/book', $payload, $headers)
            ->assertStatus(200)
            ->assertJsonFragment(['id' => 1, 'category_id' => 2,
            'title' => 'lorem ada',
            'avatar' =>  'https://via.placeholder.com/640x480.png/006699?text=beat',
            'rate' => 0,
            'publisher_id' => 3,
            'price' => 327813,
            'number_stock' => 0,
            'number_sold' =>0]);
    }

    public function testsArticlesAreUpdatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $book = Book::factory()->create([
            'category_id' => 3,
            'title' => 'lorem ada',
            'avatar' =>  'https://via.placeholder.com/640x480.png/006499?text=bdeat',
            'rate' => 0,
            'publisher_id' => 1,
            'price' => 32713,
            'number_stock' => 0,
            'number_sold' =>0
        ]);

        $payload = [
            'category_id' => 2,
            'title' => 'lorem ada',
            'avatar' =>  'https://via.placeholder.com/640x480.png/006699?text=beat',
            'rate' => 0,
            'publisher_id' => 8,
            'price' => 32783,
            'number_stock' => 0,
            'number_sold' =>0
        ];

        $response = $this->json('PUT', 'api/book' . $book->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => 1,
                'category_id' => 2,
                'title' => 'lorem ada',
                'avatar' =>  'https://via.placeholder.com/640x480.png/006699?text=beat',
                'rate' => 0,
                'publisher_id' => 8,
                'price' => 32783,
                'number_stock' => 0,
                'number_sold' =>0
            ]);
    }

    public function testsArtilcesAreDeletedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $article = Book::factory()->create([
            'title' => 'First Article',
            'price' => 134321,
        ]);

        $this->json('DELETE', 'api/book' . $article->id, [], $headers)
            ->assertStatus(204);
    }

    public function testArticlesAreListedCorrectly()
    {
        Book::factory()->create([
            'title' => 'First Article',
            'price' => 13432,
        ]);

        Book::factory()->create([
            'title' => 'Second Article',
            'price' => 1343254,
        ]);

        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', 'api/book', [], $headers)
            ->assertStatus(200)
            ->assertJsonFragment([
                [ 'title' => 'First Article', 'price' => 134332 ],
                [ 'title' => 'Second Article', 'price' => 134232 ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'price', 'title', 'created_at', 'updated_at'],
            ]);
    }

}
