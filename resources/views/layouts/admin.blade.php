@extends('layouts.index')

@section('title')Администрирование@endsection

@section('content')
    <h3>Пользователи</h3>
    @include('layouts.messages')
    <table class="table table-striped">
        <tr>
            <th>Логин</th>
            <th>E-mail</th>
            <th>Роль</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                @if($user->role->name == 'user')
                <td>
                    @if($user->banned == false)
                        <form method="POST" action="{{route('ban', $user)}}">
                            @csrf
                            <input class="btn btn-outline-danger" type="submit" value="Забанить">
                        </form>
                    @else
                        <form method="POST" action="{{route('unban', $user)}}">
                            @csrf
                            <input class="btn btn-outline-success" type="submit" value="Разбанить">
                        </form>
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{route('makeAdmin', $user)}}">
                        @csrf
                        <input class="btn btn-outline-primary" type="submit" value="Назначить администратором">
                    </form>
                </td>
                @else <td></td><td></td>
                @endif
            </tr>
        @endforeach
    </table>
    {{$users->onEachSide(3)->links() }}
@endsection
