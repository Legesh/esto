<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use \Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
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
        $transaction = factory(Transaction::class)->create(['user_id' => $user->id]);
        $response = $this->getJson("/api/users/{$user->id}/transactions/{$transaction->id}");

        $response->assertStatus(200);
        $response->assertJson(['amount' => $transaction->amount]);
    }
    public function testUserGetAll()
    {
        $user = factory(User::class)->create();
        $transactions = factory(Transaction::class, 3)->create(['user_id' => $user->id]);
        $response = $this->getJson("/api/users/{$user->id}/transactions");

        $response->assertStatus(200);
    }
    public function testTransactionCreateTest()
    {
        $user = factory(User::class)->create();
        $transactionData = factory(Transaction::class)->make()->toArray();
        $transactionData['user_id'] = $user->id;
        $response = $this->postJson("/api/users/{$user->id}/transactions", $transactionData);

        $response->assertStatus(201);
    }
    public function testTransactionGet()
    {
        $user = factory(User::class)->create();
        $transaction = factory(Transaction::class)->create(['user_id' => $user->id]);
        $response = $this->getJson("/api/users/{$user->id}/transactions/{$transaction->id}");

        $response->assertStatus(200);
        $response->assertJson(['amount' => $transaction->amount]);
    }
    public function testTransactionGetAll()
    {
        $user = factory(User::class)->create();
        $transactions = factory(Transaction::class, 3)->create(['user_id' => $user->id]);
        $response = $this->getJson("/api/users/{$user->id}/transactions");

        $response->assertStatus(200);
    }
}
