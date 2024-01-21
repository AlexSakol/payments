@extends('layouts.index')

@section('title')Добавление лимита@endsection

@section('content')
    <h3>Добавить лимит</h3>
    @include('layouts.messages')
    <form method="POST" action="{{route('add_limit')}}">
        @csrf
        <div class="form-group mt-3">
            <label for="date">Месяц и год</label>
            <input class="form-control" type="month" name="date" value = "{{ old ('start_date') }}"
                   id="date">
        </div>
        <div class="form-group mt-3 mb-3">
            <label for="price">Сумма</label>
            <input class="form-control" type="text" name="price" value = "{{ old ('price') }}"
                   placeholder="Введите сумму" id="price">
        </div>
        <input class="btn btn-success" type="submit" value="Добавить">
    </form>
@endsection
