@extends('layouts.index')

@section('title')Платежи@endsection

@section('content')
    <h3>Мои платежи</h3>
    @include('layouts.messages')
    @include('layouts.banned')

    <div class="row">

    <div class="dropdown col-lg-4">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Категории
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('payments')}}">Все</a></li>
            @foreach($categories as $category)
                <li><a class="dropdown-item" href="{{route('payments', ['category_id' => $category->id])}}">
                        {{$category->name}}</a></li>
            @endforeach
        </ul>
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
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_payment"> Удалить </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $payments->onEachSide(3)->links() }}
    <h6>Итого на странице, сумма: {{$payments->sum('price')}} руб.</h6>
        <a class="btn btn-success mt-3" href="{{route('create_payment')}}">Добавить</a>


    <div class="modal fade" id="delete_payment" tabindex="-1" aria-labelledby="delete_paymentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete_paymentLabel">Удалить платеж</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('delete_payment', $payment)}}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Внимание! Действие необратимо.</p>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-danger" type="submit" value="Удалить">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
