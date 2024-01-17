@extends('layouts.index')

@section('title')Добавление платежа@endsection

@section('content')
    <h3>Добавить платёж</h3>
    @include('layouts.messages')
    <form method="POST" action="{{route('add_payment')}}">
        @csrf
        <div class="form-group mt-3">
            <label>Наименование</label>
            <input class="form-control" type="text" name="name" value = "{{ old('name') }}"
                   placeholder="Введите наименование">
        </div>
        <div class="form-group mt-3">
            <label>Сумма</label>
            <input class="form-control" type="text" name="price" value = "{{ old('price') }}"
                   placeholder="Введите сумму">
        </div>
        <div class="form-group mt-3">
            <label>Дата</label>
            <input class="form-control" type="date" name="date" value = "{{ old('date') }}"
                   placeholder="Введите дату">
        </div>
        <div class="form-group mt-3">
            <label>Категория</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3 mb-3">
            <label>Доход/расход</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_income" id="type" value="1"
                    {{old('is_income') == true ? 'checked' : ''}}>
                <label class="form-check-label" for="type">
                    Доход
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_income" id="type" value="0"
                    {{old('is_income') == false ? 'checked' : ''}}>
                <label class="form-check-label" for="type">
                    Расход
                </label>
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Добавить">
    </form>
@endsection
