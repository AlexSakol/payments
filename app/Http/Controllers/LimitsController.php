<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
