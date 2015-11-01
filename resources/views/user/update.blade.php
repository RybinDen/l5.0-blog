@extends('layouts.app')
@section('title')
   Изменение личных данных
@stop
@section('content')

<h1>Изменение личных данных</h1>
<form method="post" action="/user/update" class="form-horizontal">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
email: <input type="email" name="email" value="{{$user->email}}" title="email" required>
</div>
<div class="form-group">
Имя на сайте: <input type="text" name="name" value="{{$user->name}}" title="Имя на сайте" required>
</div>
<div class="form-group">
Реальное имя: <input type="text" name="first_name" value="{{$user->first_name}}" title="Реальное имя">
</div>
<div class="form-group">
Фамилия: <input type="text" name="last_name" value="{{$user->last_name}}" title="Фамилия">
</div>
<div class="form-group">
Город: <input type="text" name="city" value="{{$user->city}}" title="Город">

</div>
<div class="form-group">
Расскажите о себе: <input type="text" name="info" value="{{$user->info}}" title="Расскажите о себе">

</div>
<div class="form-group">
<input type="submit" value="сохранить">
</div>
</form>
@stop