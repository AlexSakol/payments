@extends('layouts.index')

@section('title')Мой баланс@endsection

@section('content')
    @include('layouts.banned')
    <h3>Мой баланс</h3>
    <form method="GET" action="{{route('balance')}}">
        <label for="date">Месяц и год</label>
        <input type="month" name="date" id="date">
        <input type ="submit" value="Выбрать">
    </form>
    <h5>Доходы</h5> {{$incomes}}
    <h5>Расходы</h5> {{$debts}}
    <h5>Баланс</h5> {{$incomes - $debts}}
    @if($incomes - $debts < 0)
        <h4 style="color:red">Ваши расходы превышают доходы<h4>
    @endif
    @if($limit != null)
        <h5>Лимит на расходы</h5> {{$limit->price}}
        @if($debts > $limit->price)
            <h4 style="color:red">Вы превысили лимит на расходы<h4>
        @endif
    @endif

@endsection
