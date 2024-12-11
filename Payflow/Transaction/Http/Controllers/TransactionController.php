<?php

namespace Payflow\Transaction\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function postPayment(): Response
    {
        return response()->noContent();
    }
}