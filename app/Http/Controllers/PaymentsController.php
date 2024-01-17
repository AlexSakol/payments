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
    public function getPayments()
    {
        $user = Auth::user();
        if($user != null)
        {
            $payments = $user->payments;
            return view('payments.payments', ['payments' => $payments]);
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

    public function deletePayment(Request $request)
    {
        Payment::destroy($request->input('id'));
        return redirect()->route('payments')->with('success', 'Платеж удален');
    }

    public function editPaymentView(int $id)
    {
        $payment = Payment::find($id);
        if($payment != null)
        {
            $categories = Category::all();
            return view('payments.edit_payment', ['payment' => $payment, 'categories' => $categories]);
        }
        else
        {
            return redirect()->route('payments');
        }
    }

    public function updatePayment(int $id, PaymentRequest $request)
    {
        $payment = Payment::find($id);
        if($payment != null)
        {
            $payment->name = $request->input('name');
            $payment->price = $request->input('price');
            $payment->date = $request->input('date');
            $payment->category_id = $request->input('category_id');
            $payment->is_income = $request->input('is_income');
            $payment->save();
        }
        return redirect()->route('payments')->with('success', 'Платеж обновлен');
    }
}
