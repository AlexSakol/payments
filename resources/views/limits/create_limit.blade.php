@extends('layouts.index')

@section('title')Добавление лимита@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto col-lg-6 mt-5 mb-5">
        <div class="card-header">Добавить лимит</div>
        <div class="card-body">
            <form method="POST" action="{{route('add_limit')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="date">Месяц и год</label>
                    <input class="form-control" type="month" name="date" value = "{{ old ('start_date') }}"
                           id="date">
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="price">Сумма (ввод десятичной части обязателен, разделитель - точка)</label>
                    <input class="form-control" type="text" name="price" value = "{{ old ('price') }}"
                           placeholder="Введите сумму" id="price">
                </div>
                <input class="btn btn-success" type="submit" value="Добавить">
            </form>
        </div>
    </div>
@endsection
