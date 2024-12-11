<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Picpay\Transaction\Enum\TransactionStatusEnum;
use Picpay\Wallet\Wallet;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{

    use DatabaseMigrations;

    public function testPostPayment()
    {
        // Resolve
        $payer = Wallet::factory()->customer()->create([
            'balance' => 10_00
        ]);
        $payee = Wallet::factory()->customer()->create([
            'balance' => 0
        ]);
        $amount = 5_00;

        // Act
        $response = $this->postJson(route('transaction.store'), [
            'payer_id' => $payer->getKey(),
            'payee_id' => $payee->getKey(),
            'amount' => 100
        ]);

        // Asset
        $response->assertNoContent();

        $this->assertDatabaseHas('transactions', [
            'payer_id' => $payer->getKey(),
            'payee_id' => $payee->getKey(),
            'amount' => 100,
            'status' => TransactionStatusEnum::Completed
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $payer->getKey(),
            'balance' => 5_00
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $payee->getKey(),
            'balance' => 5_00
        ]);
    }
}