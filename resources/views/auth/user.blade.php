@extends('layouts.app')
@section('title')
{{$user->name}}
@endsection
@section('content')
<div class="page-header">
<h1>Профиль пользователя {{$user->name}}</h1>
</div>

<p>Пользователь не активирован.</p>
<p>Пользователь временно заблокирован</p> 
<img src="uploads/{{$user->id}}.jpg" alt="{{$user->name}}">
<a href="user/update">Добавить/изменить данные</a>
<a href="user/upload">Загрузить/поменять фото</a>
<a href="user/password">Сменить пароль</a>
<a href="message/user/{{$user->id}}">Диалоги</a>
<div>
Id: {{ $user->id }}
</div>
<div>
{{$user->last_name.' '.$user->first_name}}
</div>
<div>Город: {{$user->city}}</div>
<div>Email: {{$user->email}}</div>
<div>{{$user->info}}</div>

<div>Последний вход: {{$user->last_login}}
</div>
<div>
Дата регистрации: {{date_create($user->created_at)->format('d.m.Y H:m')}}
</div>
<div>
Группа: 
</div>
@endsection
