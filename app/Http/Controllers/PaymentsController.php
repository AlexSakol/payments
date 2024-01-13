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
        else return redirect()->route('main');
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
        $payment->name = $request->input('name');
        $payment->price = $request->input('price');
        $payment->date = $request->input('date');
        $payment->category_id = $request->input('category_id');
        $payment->type_id = $request->input('type_id');
        $payment->save();
        return redirect()->route('payments');
    }

    public function deletePayment(Request $request)
    {
        Payment::destroy($request->input('id'));
        return redirect()->route('payments');
    }
}
