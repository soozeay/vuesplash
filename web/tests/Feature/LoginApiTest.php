<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
      parent::setUp();

      $this->user = User::factory()->create();
    }

    /**
     *
     */
    public function test_can_login_registered_user()
    {
      $response = $this->json('POST', route('login'), [
        'email' => $this->user->email,
        'password' => 'password',
      ]);

      $response
        ->assertStatus(200)
        ->assertJson(['name' => $this->user->name]);

      $this->assertAuthenticatedAs($this->user);
    }
}
