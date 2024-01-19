<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function balance()
    {
        $user = Auth::user();
        if($user != null)
        {
            $payments = Payment::where('user_id', $user->id);
            $incomes = $payments->where('is_income', true)->sum('price');
            $debts = $payments->where('is_income', false)->sum('price');
            $balance = $incomes - $debts;
            return view('balance.balance', ['balance' => $balance]);
        }
        else return view('main');
    }
}
