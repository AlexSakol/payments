@extends('layouts.index')

@section('title')Лимиты@endsection

@section('content')
    <h3>Мои лимиты</h3>
    @include('layouts.messages')
    <table class="table table-striped">
        <tr>
            <th>Месяц и год</th>
            <th>Сумма</th>
            <th></th><th></th>
        </tr>
        @foreach($limits as $limit)
            <tr>
                <td>{{$limit->date}}</td>
                <td>{{$limit->price}}</td>
                <td>
                    <a class="btn btn-outline-info" href="{{route('edit_limit', $limit->id)}}">
                        Редактировать</a>
                </td>
                <td>
                    <form method="POST" action="{{route('delete_limit', $limit)}}">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-outline-danger" type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-success" href="{{route('create_limit')}}">Добавить</a>
@endsection
