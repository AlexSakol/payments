<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Payment;
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

    public function addPaymentView()
    {
        $categories = Category::all();
        return view('create_payment', ['categories' => $categories]);
    }

    public function addPayment(Request $request)
    {
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->name = $request['name'];
        $payment->price = $request['price'];
        $payment->date = $request['date'];
        $payment->category_id = $request['category_id'];
        $payment->type_id = $request['type_id'];
        $payment->save();
        return redirect(route('payments'));
    }
}
