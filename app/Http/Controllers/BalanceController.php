<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Bill;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class BalanceController extends Controller
{
    public function callbackTopUp(Request $request)
    {

        $data = $request->all();
        $bill = Bill::whereDocNo($data['external_id'])->first();
        $bill->update([
            'status' => $data['status'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'bank' => $data['bank_code'],
        ]);

        $balance = Balance::whereUserId($bill['user_id'])->first();

        $cur_amount = $balance['amount'];
        $addingAmount = $cur_amount + $bill['amount'];

        $balance->update([
            'amount' => $addingAmount
        ]);
        return response()->json($bill, 200);

    }
}
