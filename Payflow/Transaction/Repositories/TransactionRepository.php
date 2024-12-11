<?php

namespace Payflow\Transaction\Repositories;

use Payflow\Transaction\DTO\TransactionDTO;
use Payflow\Transaction\Enum\TransactionStatusEnum;
use Payflow\Transaction\Transaction;

class TransactionRepository
{
    public function startTransaction(TransactionDTO $payload): Transaction
    {
        return Transaction::create([
            'payer_id' => $payload->payerId,
            'payee_id' => $payload->payeeId,
            'amount' => $payload->amount,
            'status' => TransactionStatusEnum::Created
        ]);
    }
}
