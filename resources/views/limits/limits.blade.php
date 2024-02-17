@extends('layouts.index')

@section('title')Лимиты@endsection

@section('content')
    <h3>Мои лимиты</h3>
    @include('layouts.messages')
    @include('layouts.banned')
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Месяц и год</th>
                <th>Сумма</th>
                <th></th><th></th>
            </tr>
            @foreach($limits as $limit)
                <tr>
                    <td>{{$limit->date}}</td>
                    <td>{{$limit->price}} руб.</td>
                    <td>
                        <a class="btn btn-outline-info" href="{{route('edit_limit', $limit->id)}}">
                            Редактировать</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_limit">Удалить</button>
                    </td>
                </tr>
          @endforeach
        </table>
    </div>
    <a class="btn btn-success" href="{{route('create_limit')}}">Добавить</a>

    <div class="modal fade" id="delete_limit" tabindex="-1" aria-labelledby="delete_limitLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_limitLabel">Удалить лимит</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('delete_limit', $limit)}}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Внимание! Действие необратимо.</p>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-danger" type="submit" value="Удалить">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
