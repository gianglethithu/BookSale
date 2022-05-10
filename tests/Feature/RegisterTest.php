<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    // use RefreshDatabase;
    public function testsRegistersSuccessfully()
    {
        $payload = [
            'name' => 'Jane Doe',
            'email' => 'jane@toptal.com',
            'password' => 'toptal123',
            'password_confirmation' => 'toptal123',
        ];

        $this->json('post', 'api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);
    }

    public function testsRequiresPasswordEmailAndName()
    {
        $this->json('post', 'api/register')
            ->assertStatus(422)
            ->assertJsonFragment([
                'name' => ['The name field is required.'],
                'email' => ['The email field is required.'],
                'password' => ['The password field is required.'],
            ]);
    }

    public function testsRequirePasswordConfirmation()
    {
        $payload = [
            'name' => 'Joe',
            'email' => 'joe@toptal.com',
            'password' => 'toptal123',
        ];

        $this->json('post', 'api/register', $payload)
            ->assertStatus(422)
            ->assertJsonFragment([
                'password' => ['The password confirmation does not match.'],
            ]);
    }
}
