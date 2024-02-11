@extends('layouts.index')

@section('title')Редактирование платежа@endsection

@section('content')
    @include('layouts.messages')
    <div class="card m-auto col-lg-6 mt-5">
        <div class="card-header">Редактировать платёж</div>
        <div class="card-body">
            <form method="POST" action="{{route('update_payment', $payment->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="name">Наименование</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name', $payment->name)}}"
                           id="name">
                </div>
                <div class="form-group mt-3">
                    <label for="price">Сумма</label>
                    <input class="form-control" type="text" name="price" id="price"
                           value="{{ old('price', $payment->price)}}">
                </div>
                <div class="form-group mt-3">
                    <label for="date">Дата</label>
                    <input class="form-control" type="date" name="date" value="{{ old('date' , $payment->date)}}"
                           id="date">
                </div>
                <div class="form-group mt-3">
                    <label for="category">Категория</label>
                    <select class="form-select" name="category_id" aria-label="Default select example" id="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                {{old('category_id', $payment->category_id) == $category->id  ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3 mb-3">
                    <label>Доход/расход</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_income" id="type" value="1"
                            {{old('is_income', $payment->is_income) == true ? 'checked' : ''}}>
                        <label class="form-check-label" for="type">
                            Доход
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_income" id="type" value="0"
                            {{old('is_income', $payment->is_income) == false ? 'checked' : ''}}>
                        <label class="form-check-label" for="type">
                            Расход
                        </label>
                    </div>
                </div>
                <input class="btn btn-info" type="submit" value="Редактировать">
            </form>
        </div>
    </div>

@endsection
