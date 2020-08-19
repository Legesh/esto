<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCreateTest()
    {
        $response = $this->postJson('/api/users', factory(User::class)->make()->toArray());

        $response->assertStatus(201);
    }

    public function testUserGet()
    {
        $user = factory(User::class)->create();
        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200);
        $response->assertJson(['name' => $user->name]);
    }

    public function testUserGetAll()
    {
        $users = factory(User::class, 5)->create();
        $response = $this->getJson("/api/users");

        $response->assertStatus(200);
    }
}
