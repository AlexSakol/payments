@extends('layouts.index')

@section('title')Добавление лимита@endsection

@section('content')
    <h3>Добавить лимит</h3>
    @include('layouts.messages')
    <form method="POST" action="{{route('add_limit')}}">
        @csrf
        <div class="form-group mt-3">
            <label>Начальная дата</label>
            <input class="form-control" type="date" name="start_date" value = "{{ old ('start_date') }}"
                   placeholder="Введите начальную дату">
        </div>
        <div class="form-group mt-3">
            <label>Конечная дата</label>
            <input class="form-control" type="date" name="end_date" value = "{{ old ('end_date') }}"
                   placeholder="Введите конечную дату">
        </div>
        <div class="form-group mt-3 mb-3">
            <label>Сумма</label>
            <input class="form-control" type="text" name="price" value = "{{ old ('price') }}"
                   placeholder="Введите сумму">
        </div>
        <input class="btn btn-success" type="submit" value="Добавить">
    </form>
@endsection
