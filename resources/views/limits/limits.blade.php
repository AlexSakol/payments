@extends('layouts.index')

@section('title')Лимиты@endsection

@section('content')
    <h3>Мои лимиты</h3>
    <table class="table table-striped">
        <tr>
            <th>Начальная дата</th>
            <th>Конечная дата</th>
            <th>Сумма</th>
            <th></th><th></th>
        </tr>
        @foreach($limits as $limit)
            <tr>
                <td>{{$limit->start_date}}</td>
                <td>{{$limit->end_date}}</td>
                <td>{{$limit->price}}</td>
                <td>
                    <a class="btn btn-outline-info" href="#">
                        Редактировать</a>
                </td>
                <td>
                    <form method="POST" action="{{route('delete_limit')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$limit->id}}">
                        <input class="btn btn-outline-danger" type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-success" href="{{route('create_limit')}}">Добавить</a>
@endsection
