<?php
namespace Payflow\Transaction\Enum;

enum TransactionStatusEnum: string
{
    case Created = 'created';
    case Withdrawed = 'withdrawed';
    case Completed = 'completed';
    case Debited = 'debited';
}