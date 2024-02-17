<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Главная</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('payments')}}">Мои платежи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('limits')}}">Мои лимиты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('balance')}}">Баланс</a>
                </li>
                    @if(Auth::user()->role->name == 'admin')
                        <li>
                            <a class="nav-link text-white" href="{{route('admin')}}">Администрирование</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('instruction')}}">Инструкция</a>
                </li>
            </ul>
            @guest
                <a href="{{route('login')}}" class="btn btn-outline-light me-2">Войти</a>
                <a href="{{route('register')}}" class="btn btn-warning">Зарегистрироваться</a>
            @else
                <li class="dropdown">
                    <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}">Кабинет</a></li>
                        <li>
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <input type="submit" class="dropdown-item" value="Выйти">
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </div>
    </div>
</nav>

