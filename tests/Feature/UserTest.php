<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factory\UserFactory;

class UserTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Ginag Lee',
            'email' => 'ginag@mail.com'
        ]);
        $user2 = User::make([
            'name' => 'Ginag',
            'email' => 'lee@mail.com'
        ]);
        $this->assertTrue($user1->name != $user2->name);
    }
    // public function test_user_delete()
    // {
    //     $user = User::factory()->count(1)->make();
    //     $user = User::first();
    //     if ($user) {
    //         $user->delete();
    //     }
    //     $this->assertTrue(true);
    // }
    // public function test_it_store_new_users()
    // {
    //     $response = $this->post('/register',[
    //         'name' => 'Ginag Lee',
    //         'email' => 'ginag@mail.com',
    //         'password' => '123',
    //         'password_confirmation' => '123'
    //     ]);
    //     $response->assertRedirect('home');
    // }
}
