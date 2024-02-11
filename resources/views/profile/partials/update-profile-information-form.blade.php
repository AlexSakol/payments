@if (session('status') === 'profile-updated')
    <div class='alert alert-success mt-3'>
        Данные успешно обновлены
    </div>
@endif

<div class="card mt-4">
    <div class="card-header">
        <h2>Изменить данные<h2>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div class="form-group mt-3">
                <label for="name">Новый логин</label>
                <input id="name" name="name" type="text" class="form-control"
                       value="{{old('name', $user->name)}}" required autofocus autocomplete="name" />
            </div>
            <div class="form-group mt-3">
                <label for="name">Новый e-mail</label>
                <input id="email" name="email" type="email" class="form-control"
                       value="{{old('email', $user->email)}}" required autocomplete="username" />
            </div>
            <div class="form-group mt-3">
                <input class="btn btn-success" type="submit" value="Сохранить">
            </div>
        </form>
    </div>
</div>
