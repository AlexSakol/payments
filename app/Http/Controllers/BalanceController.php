<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Limit;

class BalanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getBalance(Request $request)
    {
        $user = Auth::user();
        $limits = Limit::where('user_id', $user->id);
        $date = $request->input('date');
        if($user != null)
        {
            $incomes = $user->payments->where('is_income', true);
            $debts = $user->payments->where('is_income', false);
            if($date != null)
            {
                $limit = $limits->firstWhere('date', $date);
                $incomes = $incomes->whereBetween('date', [$date . '-01', $date . '-31']);
                $debts = $debts->whereBetween('date', [$date . '-01', $date . '-31']);
            }
            else $limit = null;
            $incomes = $incomes->sum('price');
            $debts = $debts->sum('price');
            $balance = $incomes-$debts;
            return view('balance.balance', ['incomes' => $incomes, 'debts' => $debts,
                'limit' => $limit, 'balance' => $balance]);
        }
        else return view('main');
    }

}
