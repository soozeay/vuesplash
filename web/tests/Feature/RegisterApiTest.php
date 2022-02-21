<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{
  use RefreshDatabase;

    /**
     *
     */
    public function test_can_make_new_user()
    {
      $data = [
        'name' => 'test user',
        'email' => 'dummy@email.com',
        'password' => 'test1234',
        'password_confirmation' => 'test1234'
      ];

      $response = $this->json('POST', route('register'), $data);

      $user = User::first();
      $this->assertEquals($data['name'], $user->name);

      $response
        ->assertStatus(201)
        ->assertJson(['name' => $user->name]);

    }
}
