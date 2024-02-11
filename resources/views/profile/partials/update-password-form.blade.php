@if(session('status') == 'password-updated')
    <div class='alert alert-success mt-3'>
        Пароль успешно обновлен
    </div>
@endif

<div class="card mt-4">
    <div class="card-header">
        <h2>Сменить пароль</h2>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <div class="form-group mt-3">
                <label for="password">Текущий пароль</label>
                <input class="form-control" id="update_password_current_password" name="current_password"
                       type="password" autocomplete="current-password">
            </div>
            <div class="form-group mt-3">
                <label for="password">Новый пароль</label>
                <input class="form-control" id="update_password_password" name="password"
                       type="password" autocomplete="new-password">
            </div>
            <div class="form-group mt-3">
                <label for="password_confirmation">Повторите пароль</label>
                <input class="form-control" id="update_password_password_confirmation" name="password_confirmation"
                       type="password" autocomplete="new-password">
            </div>
            <div class="form-group mt-3">
                <input class="btn btn-primary" type="submit" value="Сохранить">
            </div>
        </form>
    </div>
</div>
