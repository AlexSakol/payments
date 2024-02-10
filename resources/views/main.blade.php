@extends('layouts.index')
@section('title')Главная@endsection
@section('content')
    <h2 class="text-center">
        Система контроля платежей
    </h2>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/h2po01jb.png')}}" class="d-block w-100" alt="элемент 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Контролируй финансы легко и просто</h5>
                    <p>Веб-приложение учета финансов</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/khcm83gb.png')}}" class="d-block w-100" alt="элемент 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Наглядная и понятная форма отображения операций</h5>
                    <p>Таблица с датами и суммами операций </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/wnr4dtsl.png')}}" class="d-block w-100" alt="элемент 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Распределяй операции по категориям</h5>
                    <p>Контролируй каждую статью бюджета</p>
                </div>
            </div>
        </div>
    </div>
@endsection
