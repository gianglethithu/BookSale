<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class LogoutTest extends TestCase
{
    // use RefreshDatabase;
    public function testUserIsLoggedOutProperly()
    {
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $this->json('get', 'api/book', [], $headers)->assertStatus(200);
        // $response = $this->withHeaders($headers)->get('api/book');
        // $response->assertStatus(401);
        // $response = $this->withHeaders($headers)->post('api/logout');
        // $response->assertStatus(401);
        $this->json('post', 'api/logout', [], $headers)->assertStatus(200);

        $user = User::find($user->id);

        $this->assertEquals(null, $user->api_token);
    }

    public function testUserWithNullToken()
    {
        // Simulating login
        $user = User::factory()->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        // Simulating logout
        $user->api_token = null;
        $user->save();

        $this->json('get', 'api/book', [], $headers)->assertStatus(401);
        // $response = $this->withHeaders($headers)->get('api/book');
        // $response->assertStatus(401);
    }
}
