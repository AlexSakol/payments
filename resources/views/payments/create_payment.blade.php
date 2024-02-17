@extends('layouts.index')

@section('title')Добавление платежа@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto col-lg-6 mt-5">
        <div class="card-header">Добавить платёж</div>
        <div class="card-body">
            <form method="POST" action="{{route('add_payment')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Наименование</label>
                    <input class="form-control" type="text" name="name" value = "{{ old('name') }}"
                           placeholder="Введите наименование" id="name">
                </div>
                <div class="form-group mt-3">
                    <label for="price">Сумма (ввод десятичной части обязателен, разделитель - точка)</label>
                    <input class="form-control" type="text" name="price" value = "{{ old('price') }}"
                           placeholder="Введите сумму" id="price">
                </div>
                <div class="form-group mt-3">
                    <label for="date">Дата</label>
                    <input class="form-control" type="date" name="date" value = "{{ old('date') }}"
                           placeholder="Введите дату" id="date">
                </div>
                <div class="form-group mt-3">
                    <label for="category">Категория</label>
                    <select class="form-select" name="category_id" aria-label="Default select example" id="category">
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
                <input class="btn btn-success" type="submit" value="Сохранить">
            </form>
        </div>
    </div>

@endsection
