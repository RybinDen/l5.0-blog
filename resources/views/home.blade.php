@extends('layouts.app')
@section('title')
{{$user->name}}
@endsection
@section('menu')
@if($corentUser->id ==$user->id)
<li>{!!Request::is('user/update')?'Обновить профиль':'<a href="/user/update">Обновить профиль</a>'!!}</li>
<li>{!!Request::is('user/upload')?'Загрузить фото':'<a href="/user/upload">Загрузить фото</a>'!!}</li>
<li>{!!Request::is('user/password')?'Поменять пароль':'<a href="/user/password">Поменять пароль</a>'!!}</li>
<li>{!!Request::is('user/messages')?'Сообщения':'<a href="/user/messages">Сообщения</a>'!!}</li>

@else
@if($user->activated != 0)
<li>{!!Request::is('message/create/'.$user->id)?'Написать сообщение':'<a href="message/create/{{$user->id}}">Написать сообщение</a>'!!}</li>
@endif
@endif
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>{{$user->name}}</h1></div>
<div class="panel-body">
@if($user->activated == 0)
Профиль не активирован
@else
<p>{{$user->last_name.' '.$user->first_name}}</p>
@if($user->role == 5)
<i>Роль: администратор</i>
@endif
<div>@foreach($user->fotos as $foto)
<div><img src="uploads/{{$foto->name}}" alt="фото"></div>
<a href="/user/del-foto/{{$foto->id}}">Удалить фото</a>
@endforeach
</div>

<div>Город: {{$user->city}}</div>
<div>Email: {{$user->email}}</div>
<div>{{$user->info}}</div>
<div>Дата регистрации: {{$user->created_at}}</div>
<div>Обновлено: {{$user->updated_at}}</div>
<div>Id: {{ $user->id }}</div>
@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection