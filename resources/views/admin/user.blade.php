@extends('admin.layout')
@section('title')
   управление  пользователем
@stop
@section('content')
{{HTML::image('photo/21.jpg', 'image')}}

@if($user->isActivated())
активировн<br>
@else
Не ктивирован
@endif
{{Form::model($user)}}
Id: {{ Form::text('id') }}<br>
Баланс: {{Form::text('balance')}}<br>
email: {{Form::email('email')}}<br>
Телефон: {{Form::text('phone')}}<br>
Место жительства: {{Form::text('city')}}<br>
Список прав: 
@foreach($user->getPermissions() as $permission)
{{$permission}}
@endforeach
<br>
Логин: {{Form::text('login')}}<br>
Имя: {{Form::text('first_name')}}<br>
Фамилия: {{Form::text('last_name')}}<br>
{{Form::label('secs', 'Пол')}}
 
{{Form::select('secs', ['m' => 'мужчина', 'v' => 'женщина'])}}
Дата рождения: {{Form::text('dr')}}
@if($user->activate = true)

Профиль активирован
@else
Профиль не активирован
@endif
<br>
activated_at {{ $user->activated_at}}<br>
Последний вход: {{$user->last_login}}<br>
Дата регистрации: {{$user->created_at}}<br>
Профиль обновлен: {{$user->updated_at}}<br>
{{Form::label('group', 'Группа:')}}
 
<select name="group">
@foreach(Sentry::findAllGroups() as $group)
<option value="{{$group->id}}">{{$group->name}}</option>
@endforeach
</select>

{{Form::submit('сохранить')}}
{{Form::close()}}
@stop