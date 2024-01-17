@extends('layouts.index')

@section('title')Редактирование лимита@endsection

@section('content')
    <h3>Редктировать лимит</h3>
    @include('layouts.messages')
    <form method="POST" action="{{route('update_limit', $limit->id)}}">
        @csrf
        <div class="form-group mt-3">
            <label>Начальная дата</label>
            <input class="form-control" type="date" name="start_date"
                   value="{{ old('start_date', $limit->start_date)}}">
        </div>
        <div class="form-group mt-3">
            <label>Конечная дата</label>
            <input class="form-control" type="date" name="end_date"
                   value="{{ old('end_date', $limit->end_date) }}">
        </div>
        <div class="form-group mt-3 mb-3">
            <label>Сумма</label>
            <input class="form-control" type="text" name="price"
                   value="{{old('price', $limit->price)}}">
        </div>
        <input class="btn btn-info" type="submit" value="Редактировать">
    </form>
@endsection
