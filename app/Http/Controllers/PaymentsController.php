<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentsController extends Controller
{
    public function getPayments()
    {
        $user = Auth::user();
        if($user != null)
        {
            $payments = $user->payments;
            return view('payments', ['payments' => $payments]);
        }
        else return redirect(route('main'));
    }
}
