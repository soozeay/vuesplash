<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutApiTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();

    // テストユーザー作成
    $this->user = User::factory()->create();
  }

  /**
   * @test
   */
  public function test_can_logout()
  {
    $response = $this->actingAs($this->user)
      ->json('POST', route('logout'));

    $response->assertStatus(200);
    $this->assertGuest();
  }
}
