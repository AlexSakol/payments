<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Category;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPayments()
    {
        $user = Auth::user();
        if($user != null)
        {
            $payments = $user->payments;
            $incomes = $payments->where('is_income', '=', '1')->sum('price');
            $debts = $payments->where('is_income', '=', '0')->sum('price');
            $balance = $incomes - $debts;
            return view('payments.payments', ['payments' => $payments, 'balance' => $balance]);
        }
        else return redirect()->route('main');
    }

    public function addPaymentView()
    {
        $categories = Category::all();
        return view('payments.create_payment', ['categories' => $categories]);
    }

    public function addPayment(PaymentRequest $request)
    {
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->name = $request->input('name');
        $payment->price = $request->input('price');
        $payment->date = $request->input('date');
        $payment->category_id = $request->input('category_id');
        $payment->is_income = $request->input('is_income');
        $payment->save();
        return redirect()->route('payments')->with('success', 'Платеж добавлен');
    }

    public function deletePayment(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments')->with('success', 'Платеж удален');
    }

    public function editPaymentView(Payment $payment)
    {
        $categories = Category::all();
        return view('payments.edit_payment', ['payment' => $payment, 'categories' => $categories]);
    }

    public function updatePayment(Payment $payment, PaymentRequest $request)
    {
        $payment->name = $request->input('name');
        $payment->price = $request->input('price');
        $payment->date = $request->input('date');
        $payment->category_id = $request->input('category_id');
        $payment->is_income = $request->input('is_income');
        $payment->save();
        return redirect()->route('payments')->with('success', 'Платеж обновлен');
    }
}
