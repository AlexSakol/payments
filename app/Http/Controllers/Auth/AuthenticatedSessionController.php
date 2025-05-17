<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Отображает представление окна входа
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Обработка входящего запроса аутентификации
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $request->input('recaptcha_response'),
        ]);

        $result = $response->json();

        if (!$result['success'] || $result['score'] < 0.5) {
            return back()->withErrors(['captcha' => 'Подозрительная активность']);
        }

        $request->authenticate();

        $request->session()->regenerate();

        return redirect(route('payments'));
    }

    /**
     * Сброс аутентификационной сесси
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
