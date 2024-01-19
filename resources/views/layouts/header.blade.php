<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-white">Главная</a></li>
                @auth()
                    <li>
                        <a href="{{route('payments')}}" class="nav-link px-2 text-white">Мои платежи</a>
                    </li>
                    <li>
                        <a href="{{route('limits')}}" class="nav-link px-2 text-white">Мои лимиты</a>
                    </li>
                    <li>
                        <a href="{{route('balance')}}" class="nav-link px-2 text-white">Мой баланс</a>
                    </li>
                @endauth
            </ul>
            @guest()
            <div class="text-end">
                <a href="{{route('login')}}" class="btn btn-outline-light me-2">Войти</a>
                <a href="{{route('register')}}" class="btn btn-warning">Зарегистрироваться</a>
            </div>
            @else
                <div class="text-end">
                    <div class="dropdown">
                        <a class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Кабинет</a></li>
                            <li>
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <input type="submit" class="dropdown-item" value="Выйти">
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</header>
