@extends('layouts.index')

@section('title')Мой баланс@endsection

@section('content')
    @include('layouts.banned')
    <h3>Мой баланс</h3>
    <form method="GET" action="{{route('balance')}}">
        <label for="date">Месяц и год</label>
        <input type="month" name="date" id="date">
        <input type ="submit" class="btn btn-info" value="Выбрать">
    </form>
    <h5>Доходы</h5> {{$incomes}} руб.
    <h5>Расходы</h5> {{$debts}} руб.
    <h5>Баланс</h5> {{$balance}} руб.
    @if($balance < 0)
        <h4 style="color:red">Ваши расходы превышают доходы<h4>
    @endif
    @if($limit != null)
        <h5>Лимит на расходы</h5> {{$balance}}
        @if($debts > $limit->price)
            <h4 style="color:red">Вы превысили лимит на расходы<h4>
        @endif
    @endif

@endsection
