@extends('layouts.index')

@section('title')Добавление платежа@endsection

@section('content')
    <h3>Добавить платёж</h3>
    <form method="POST" action="{{route('add_payment')}}">
        @csrf
        <div class="form-group mt-3">
            <label>Наименование</label>
            <input class="form-control" type="text" name="name" placeholder="Введите наименование">
        </div>
        <div class="form-group mt-3">
            <label>Сумма</label>
            <input class="form-control" type="text" name="price" placeholder="Введите сумму">
        </div>
        <div class="form-group mt-3">
            <label>Дата</label>
            <input class="form-control" type="date" name="date" placeholder="Введите дату">
        </div>
        <div class="form-group mt-3">
            <label>Категория</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3 mb-3">
            <label>Доход/расход</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_income" id="type" value="1" checked>
                <label class="form-check-label" for="type">
                    Доход
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_income" id="type" value="0">
                <label class="form-check-label" for="type">
                    Расход
                </label>
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Добавить">
    </form>
@endsection
