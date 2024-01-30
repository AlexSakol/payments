<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        if(Auth::user()->role->name == 'admin' && Auth::user()->banned == false)
        {
            $users = User::paginate(6);
            return view('layouts.admin', ['users' => $users]);
        }
        else return abort(403, 'Доступ запрещен');
    }

    public function ban(User $user)
    {
        if(Auth::user()->role->name == 'admin' && Auth::user()->banned == false)
        {
            $user->banned = true;
            $user->save();
            return redirect()->route('admin')->with('success', 'Пользователь забанен');
        }
        else return abort(403, 'Доступ запрещен');
    }

    public function unban(User $user)
    {
        if(Auth::user()->role->name == 'admin' && Auth::user()->banned == false)
        {
            $user->banned = false;
            $user->save();
            return redirect()->route('admin')->with('success', 'Пользователь разбанен');
        }
        else return abort(403, 'Доступ запрещен');
    }

    public function makeAdmin(User $user)
    {
        if(Auth::user()->role->name == 'admin' && Auth::user()->banned == false)
        {
            $user->role_id = 1;
            $user->save();
            return redirect()->route('admin');
        }
        else return abort(403, 'Доступ запрещен');
    }
}
