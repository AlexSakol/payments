@extends('layouts.index')

@section('title')Вход@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto w-25 mt-5 mb-5">
        <div class="card-header">Войти</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mt-3 mb-3">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name ="email" value="{{old('email')}}"
                       required autofocus autocomplete="username">
            </div>
            <div class="form-group mt-3">
                <label for="password">Пароль</label>
                <input class="form-control" type="password" id="password" name ="password"
                   required autocomplete="current-password">
            </div>
            <div class="form-group mt-3">
                <input class="btn btn-primary" type="submit" value="Войти">
            </div>
        </form>
        </div>
    </div>
@endsection
