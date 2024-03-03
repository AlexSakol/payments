<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Requests\PaymentsFilterRequest;
use App\Models\Category;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPayments(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();
        if($user != null)
        {
            $payments = Payment::where('user_id', $user->id);
            $category_id = $request->input('category_id');
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $is_income = $request->input('is_income');
            if($category_id != 0)
            {
                $payments = $payments->where('category_id', $category_id);
            }
            if($start_date != null)
            {
                $payments = $payments->where('date', '>', $start_date);
            }
            if($end_date != null)
            {
                $payments = $payments->where('date', '<', $end_date);
            }
            if($is_income != 'all')
            {
                if($is_income == '1')
                {
                    $payments = $payments->where('is_income', 1);
                }
                if($is_income == '0')
                {
                    $payments = $payments->where('is_income', 0);
                }
            }
            return view('payments.payments',
                ['payments' => $payments->paginate(5), 'categories' => $categories]);
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
