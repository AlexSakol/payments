@extends('layouts.index')

@section('title')Платежи@endsection

@section('content')
    <h3>Мои платежи</h3>
    @include('layouts.messages')
    @include('layouts.banned')

    <div class="row">

        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" aria-controls="collapse">
                        Фильтр
                    </button>
                </h2>
                <div id="collapse" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <form method="GET" action="{{route('payments')}}">
                            <div class="form-group mb-3">
                                <label for="category">Категория</label>
                                <select class="form-select" name="category_id" aria-label="Default select example" id="category">
                                    <option value="0">Все</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="start_date">Начальная дата</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="start_date">Конечная дата</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <div class="form-group">
                                <label>Доход/расход</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_income" id="type" value="all" checked>
                                    <label class="form-check-label" for="type">
                                        Все
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_income" id="type" value="1">
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
                            <input type="submit" class="btn btn-outline-dark mt-3 mb-3" value="Фильтровать">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="table-responsive">
        <table class="table table-striped mt-3">
            <tr>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Дата</th>
                <th>Категория</th>
                <th>Доход/расход</th>
                <th></th><th></th>
            </tr>
            @foreach($payments as $payment)
                <tr>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->price}} руб.</td>
                    <td>{{$payment->date}}</td>
                    <td>{{$payment->category->name}}</td>
                    <td>
                        @if($payment->is_income == true)
                            Доход
                        @else
                            Расход
                       @endif
                    </td>
                    <td>
                        <a class="btn btn-outline-info" href="{{route('edit_payment', $payment->id)}}">
                            Редактировать</a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('delete_payment', $payment)}}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-outline-danger" type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $payments->onEachSide(3)->links() }}
    <h6>Итого на странице, сумма: {{$payments->sum('price')}} руб.</h6>
        <a class="btn btn-success mt-3" href="{{route('create_payment')}}">Добавить</a>

@endsection

