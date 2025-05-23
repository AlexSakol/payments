@extends('layouts.index')

@section('title')Регистрация@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto col-lg-6 mt-5 mb-5">
        <div class="card-header">Регистрация</div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Логин</label>
                    <input class="form-control" type="text" id="name" name ="name" value="{{old('name')}}"
                           required autofocus autocomplete="name">
                </div>
                <div class="form-group mt-3">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" id="email" name ="email" value="{{old('email')}}"
                           required autofocus autocomplete="username">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Пароль</label>
                    <input class="form-control" type="password" id="password" name ="password"
                           required autocomplete="new-password">
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation">Повторите пароль</label>
                    <input class="form-control" type="password" id="password_confirmation"
                           name ="password_confirmation" required autocomplete="new-password">
                </div>
                <script src="https://www.google.com/recaptcha/api.js?render={{ env('GOOGLE_RECAPTCHA_KEY') }}"></script>
                <script>
                    grecaptcha.ready(function() {
                        grecaptcha.execute('{{ env('GOOGLE_RECAPTCHA_KEY') }}', {action: 'submit'}).then(function(token) {
                            document.getElementById('recaptchaResponse').value = token;
                        });
                    });
                </script>
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-success" value="Зарегистрироваться">
                    <a class="link-dark link-underline-light" href="{{ route('login') }}">Уже зарегистрированы?</a>
                </div>
            </form>
        </div>
@endsection

