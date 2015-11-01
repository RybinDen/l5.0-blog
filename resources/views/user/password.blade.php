@extends('layouts.app')
@section('title')
Смена пароля
@stop
@section('content')

<h1>Смена пароля</h1>
<form action="/user/password" method="post" class="form-horizontal" role="form">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
<input type="text" name="password" value="{{old('password')}}" required title="Действующий пароль">
</div>
<div class="form-group">
<input type="text" name="password1" value="{{old('password1')}}" title="Новый пароль" required>
</div>
<div classs="form-group">
<div class="form-group">
<input type="text" name="password1_comform" value="{{old('password1_comform')}}" title="Повторите новый пароль" required>
</div>
<input type="submit" value="сохранить">

</form>
@stop