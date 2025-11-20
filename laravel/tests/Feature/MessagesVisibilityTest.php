<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessagesVisibilityTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->seed();
    }

    public function test_user_sees_only_their_messages(): void
    {
        $user = User::factory()->create(['email' => 'user1@example.com']);
        $other = User::factory()->create(['email' => 'other@example.com']);

        Message::create(['user_id' => $user->id, 'name' => 'A', 'email' => $user->email, 'content' => 'Uzenet A']);
        Message::create(['user_id' => $other->id, 'name' => 'B', 'email' => $other->email, 'content' => 'Uzenet B']);

        $resp = $this->actingAs($user)->get(route('messages.index'));
        $resp->assertOk();
        $resp->assertSee('Uzenet A');
        $resp->assertDontSee('Uzenet B');
    }

    public function test_admin_sees_all_messages(): void
    {
        $admin = User::factory()->create(['role' => 'admin', 'email' => 'admin1@example.com']);
        $u1 = User::factory()->create(['email' => 'u1@example.com']);
        $u2 = User::factory()->create(['email' => 'u2@example.com']);
        Message::create(['user_id' => $u1->id, 'name' => 'M1', 'email' => $u1->email, 'content' => 'Msg1']);
        Message::create(['user_id' => $u2->id, 'name' => 'M2', 'email' => $u2->email, 'content' => 'Msg2']);

        $resp = $this->actingAs($admin)->get(route('messages.index'));
        $resp->assertOk();
        $resp->assertSee('Msg1');
        $resp->assertSee('Msg2');
    }
}
