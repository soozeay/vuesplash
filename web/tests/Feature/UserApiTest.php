<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setup();

    $this->user = User::factory()->create();
  }

    /**
     * @test
     */
    public function test_can_return_login_user()
    {
        $response = $this->actingAs($this->user)->json('GET', route('user'));

        $response->assertStatus(200)
          ->assertJson([
            'name' => $this->user->name
          ]);
    }

  /**
   * @test
   */
  public function test_can_return_null_character_when_not_login()
  {
      $response = $this->json('GET', route('user'));

      $response->assertStatus(200);
      $this->assertEquals("", $response->content());
  }
}
