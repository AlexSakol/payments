<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Главная</a></li>
        @auth()
        <li class="nav-item"><a href="{{route('payments')}}" class="nav-link px-2 text-body-secondary">Мои платежи</a></li>
        @endauth
        @guest()
        <li class="nav-item"><a href="{{route('login')}}" class="nav-link px-2 text-body-secondary">Войти</a></li>
        <li class="nav-item"><a href="{{route('register')}}" class="nav-link px-2 text-body-secondary">Зарегистрироваться</a></li>
        @else
            <li class="nav-item">
                <form method = 'POST' action="{{route('logout')}}">
                    @csrf
                    <input type="submit" class="nav-link px-2 text-body-secondary" value="Выйти">
                </form>
            </li>
        @endguest
    </ul>
    <p class="text-center text-body-secondary">© 2024 Система контроля платежей</p>
</footer>


