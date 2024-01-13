@extends('layouts.index')

@section('title')Платежи@endsection

@section('content')
    <h3>Мои платежи</h3>
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
                    <td>{{$payment->type->name}}</td>
                    <td><a class="btn btn-outline-info" href="{{route('edit_payment', $payment->id)}}">Редактировать</a></td>
                    <td>
                        <form method="POST" action="{{route('delete_payment')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$payment->id}}">
                            <input class="btn btn-outline-danger" type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a class="btn btn-success" href="{{route('create_payment')}}">Добавить</a>
@endsection
