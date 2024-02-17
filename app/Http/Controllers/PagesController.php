<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function mainView(): View
    {
        return view('main');
    }

    public function instruction(): View
    {
        return view('instruction');
    }
}
