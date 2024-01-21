<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Limit;
use App\Http\Requests\LimitRequest;

class LimitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getLimits()
    {
        $user = Auth::user();
        if($user != null)
        {
            $limits = Limit::where('user_id', $user->id);
            return view('limits.limits', ['limits' => $limits->paginate(6)]);
        }
        else return redirect()->route('main');
    }

    public function createLimitView()
    {
        return view('limits.create_limit');
    }

    public function addLimit(LimitRequest $request)
    {
        $limit = new Limit();
        $limit->date = $request->input('date');
        $limit->price = $request->input('price');
        $limit->user_id = Auth::user()->id;
        $limit->save();
        return redirect()->route('limits')->with('success', 'Лимит добавлен');
    }

    public function editLimitView(Limit $limit)
    {
        return view('limits.edit_limit', ['limit' => $limit]);
    }

    public function updateLimit(Limit $limit, LimitRequest $request)
    {
        $limit->date = $request->input('date');
        $limit->price = $request->input('price');
        $limit->save();
        return redirect()->route('limits')->with('success', 'Лимит обновлен');
    }

    public function deleteLimit(Limit $limit)
    {
        $limit->delete();
        return redirect()->route('limits')->with('success', 'Лимит удален');
    }
}
