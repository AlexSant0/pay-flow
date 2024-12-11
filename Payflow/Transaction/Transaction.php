<?php
namespace Payflow\Transaction;

use Illuminate\Database\Eloquent\Model;
use Payflow\Transaction\Enum\TransactionStatusEnum;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillables = [
        'id',
        'payer_id',
        'payee_id',
        'amount',
        'status'
    ];

    protected $casts = [
        'status' => TransactionStatusEnum::class,
        'amount' => 'integer'
    ];
}