@extends('layouts.admin')
@section('title', 'Список пользователей')
@section('content')
    @include('includes.admin_nav')
    <div id="UserInfo" class="users">
        @if (empty($users))
            <p>Нет зарегистрированных пользователей.</p>
        @endif
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Email</th>
                <th>Имя</th>
                <th>Номер телефона</th>
                <th>Дата рождения</th>
                <th>Роль</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['phone'] }}</td>
                    <td>{{ $user['date_of_birth'] }}</td>
                    <td>@if ($user['role'] == 1)
                            Администратор
                        @else
                            Пользователь
                        @endif</td>
                    <td class="ButtonDelUser">


                        <a href="{{ route('admin.users.ban', ['id' => $user['id']]) }}">
                            <button class="delUser" type="submit"
                                    onclick="return confirm('Вы уверены, что хотите забанить этого пользователя?')">
                                @if ($user['is_banned'] == 1)
                                    Разбанить
                                @else
                                    Забанить
                                @endif
                            </button>
                        </a>


                        <a href="{{ route('admin.delete', ['id' => $user['id']]) }}">
                            <button class="delUser" type="submit"
                                    onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">
                                Удалить
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection