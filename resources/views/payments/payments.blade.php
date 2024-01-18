@extends('layouts.index')

@section('title')Платежи@endsection

@section('content')
    <h3>Мои платежи</h3>
    @include('layouts.messages')
        <table class="table table-striped">
            <tr>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Дата</th>
                <th>Категория</th>
                <th>Доход/расход</th>
                <th></th><th></th>
            </tr>
            @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->price}}</td>
                    <td>{{$payment->date}}</td>
                    <td>{{$payment->category->name}}</td>
                    <td>
                        @if($payment->is_income == true)
                            Доход
                        @else
                            Расход
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-outline-info" href="{{route('edit_payment', $payment->id)}}">
                            Редактировать</a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('delete_payment', $payment)}}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-outline-danger" type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a class="btn btn-success" href="{{route('create_payment')}}">Добавить</a>
        <h4>Ваш баланс</h4>
        <p>{{$balance}}</p>
@endsection
