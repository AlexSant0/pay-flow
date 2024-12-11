<?php

namespace Payflow\Transaction;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Payflow\Transaction\Http\Controllers\TransactionController;

class TransactionRouteProvider extends RouteServiceProvider
{
    public function map(): void
    {
        Route::post(
            '/transactions',
            [TransactionController::class,
             'postPayment'])->name('transaction.store');
    }
}