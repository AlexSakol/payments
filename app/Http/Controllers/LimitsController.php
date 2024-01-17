<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Limit;
use App\Http\Requests\LimitRequest;

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

    public function addLimit(LimitRequest $request)
    {
        $limit = new Limit();
        $limit->start_date = $request->input('start_date');
        $limit->end_date = $request->input('end_date');
        $limit->price = $request->input('price');
        $limit->user_id = Auth::user()->id;
        $limit->save();
        return redirect()->route('limits')->with('success', 'Лимит добавлен');
    }

    public function editLimitView(int $id)
    {
        $limit = Limit::find($id);
        if($limit != null)
        {
            return view('limits.edit_limit', ['limit' => $limit]);
        }
        else
        {
            return redirect()->route('limits');
        }
    }

    public function updateLimit(int $id, LimitRequest $request)
    {
        $limit = Limit::find($id);
        if($limit != null)
        {
            $limit->start_date = $request->input('start_date');
            $limit->end_date = $request->input('end_date');
            $limit->price = $request->input('price');
            $limit->save();
        }
        return redirect()->route('limits')->with('success', 'Лимит обновлен');
    }

    public function deleteLimit(Request $request)
    {
        Limit::destroy($request->input('id'));
        return redirect()->route('limits')->with('success', 'Лимит удален');
    }
}
