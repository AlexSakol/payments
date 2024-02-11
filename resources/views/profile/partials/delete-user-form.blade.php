<div class="card mt-4">
    <div class="card-header">
        <h2>Удалить аккаунт</h2>
    </div>
    <div class="card-body">
        <p>При удалении аккаунта все данные будут удалены без возможности восстановления</p>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete_account">
            Удалить аккаунт
        </button>
    </div>
</div>

<div class="modal fade" id="delete_account" tabindex="-1" aria-labelledby="delete_accountLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="delete_accountLabel">Удалить аккаунт</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label for="password">Пароль</label>
                        <input class="form-control" type="password" id="password" name ="password"
                               required autocomplete="current-password">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-danger" value="Удалить">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>


