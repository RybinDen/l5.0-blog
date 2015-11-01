@extends('layouts.app')

@section('title')
{{$user->name}}
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>{{$user->name}}</h1></div>
<p>{{$user->last_name.' '.$user->first_name}}</p>
<div class="panel-body">
	@if($user->activated == 0)
<p>Пользователь не активирован.</p>
@else
<!--<p>Пользователь временно заблокирован</p>--> 
<img src="uploads/{{$user->id}}.jpg" alt="{{$user->name}}">
<a href="message/user/{{$user->id}}">Сообщения</a>
<div>
Id: {{ $user->id }}
</div>

<div>Город: {{$user->city}}</div>
<div>Email: {{$user->email}}</div>
<div>{{$user->info}}</div>

<div>last_login: {{date_create($user->last_login)->format('d.m.Y H:m')}}</div>
<div>
Дата регистрации: {{date_create($user->created_at)->format('d.m.Y H:m')}}
</div>
<div>Обновлено: {{date_create($user->updated_at)->format('d.m.Y H:m')}}</div>
	
</div>
			</div>
		</div>
	</div>
</div>
activated_at {{$user->activated_at}}<br>
@endif
activation_code {{$user->activation_code}}

@endsection