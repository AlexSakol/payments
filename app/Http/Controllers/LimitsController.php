<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Limit;

class LimitsController extends Controller
{
    public function getLimits()
    {
        $user = Auth::user();
        if($user != null)
        {
            $limits = $user->limits;
            return view('limits.limits', ['limits' => $limits]);
        }
        else return redirect()->route('main');
    }

    public function createLimitView()
    {
        return view('limits.create_limit');
    }

    public function addLimit(Request $request)
    {
        $limit = new Limit();
        $limit->start_date = $request->input('start_date');
        $limit->end_date = $request->input('end_date');
        $limit->price = $request->input('price');
        $limit->user_id = Auth::user()->id;
        $limit->save();
    }

    public function deleteLimit(Request $request)
    {
        Limit::destroy($request->input('id'));
        return redirect()->route('limits');
    }
}
