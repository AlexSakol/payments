@extends('layouts.index')

@section('title')Редактирование лимита@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto col-lg-6 mt-5 mb-5">
        <div class="card-header">Редактировать лимит</div>
        <div class="card-body">
            <form method="POST" action="{{route('update_limit', $limit->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="date">Месяц и год</label>
                    <input class="form-control" type="month" name="date" value="{{ old('date', $limit->date)}}"
                           id="date">
                </div>
                <div class="form-group mt-3 mb-3">
                    <label for="price">Сумма</label>
                    <input class="form-control" type="text" name="price"
                           value="{{old('price', $limit->price)}}" id="price">
                </div>
                <input class="btn btn-info" type="submit" value="Редактировать">
            </form>
        </div>
    </div>

@endsection
