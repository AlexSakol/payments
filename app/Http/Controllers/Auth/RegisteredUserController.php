<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Отображение представления окна регистрации
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Обработка входящего запроса на регистрацию пользователя
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validation_rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
        $validation_messages = [
            'name.required' => 'Логин не заполнен',
            'name.max' => 'Логин должен быть до 255 символов длиной',
            'email.required' => 'Email не заполнен',
            'email.email' => 'Некорректный формат email',
            'email.max' => 'Email должен быть до 255 символов длиной',
            'email.unique' => 'Пользователь с таким Email уже зарегистрирован',
            'password.required' => 'Пароль не заполнен',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Пароль должен быть не менее 8-ми символов'
        ];
        $request->validate($validation_rules, $validation_messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('payments');
    }
}
