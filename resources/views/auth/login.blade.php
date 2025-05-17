@extends('layouts.index')

@section('title')Вход@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto col-lg-3 mt-5 mb-5">
        <div class="card-header">Войти</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name ="email" value="{{old('email')}}"
                       required autofocus autocomplete="username">
            </div>
            <div class="form-group mt-3">
                <label for="password">Пароль</label>
                <input class="form-control" type="password" id="password" name ="password"
                   required autocomplete="current-password">
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
                <input class="btn btn-primary" type="submit" value="Войти">
            </div>
        </form>
        </div>
    </div>

@endsection
