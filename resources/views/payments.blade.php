@extends('layouts.index')

@section('title')Платежи@endsection

@section('content')
    <div class="container">
        <h3>Мои платежи</h3>
        <table class="table table-striped">
            <tr>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Дата</th>
                <th>Категория</th>
                <th>Доход/расход</th>
            </tr>
            @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->price}}</td>
                    <td>{{$payment->date}}</td>
                    <td>{{$payment->category->name}}</td>
                    <td>{{$payment->type->name}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
