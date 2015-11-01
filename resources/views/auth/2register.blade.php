@extends('layouts.master')
@section('title')
Регистрация
@stop
@section('content')
<div class="page-header">
<h2>Регистрация</h2>
</div>

<form class="form-horizontal">
<div class="form-group{{ $errors->has('login') ? ' has-error' : ' has-success' }}">
<label for="login" class="col-sm-4 control-label">Придумайте себе логин</label>
<div class="col-sm-8">
<input type="text" name="login" value="{{Input::old('login')}}" class="form-control" required autofocus aria-required="true" aria-describedby="help-login" pattern="[A-Za-zА-Яа-я-0-9]+" title="Логин">
<p id="help-login" class="help-block">{{$errors->first('login')}}</p>
</div>
</div>

<div class="form-group {{ $errors->has('email') ? ' has-error' : ' has-success' }}">
<label for="email" class="col-sm-4 control-label">Ваш Email</label>
<div class="col-sm-8">
<input type="email" name="email" value="{{Input::old('email')}}" class="form-control" required aria-required="true" aria-describedby="help-email" title="Реальный email, на него будет выслан код активации">

<p id="help-email" class="help-block">{{$errors->first('email')}}</p>
</div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : ' has-success' }}">
<label for="password" class="col-sm-4 control-label">Придумайте пароль не менее 6 символов:</label>

<div class="col-sm-8">
<input type="password" name="password" class="form-control" required aria-required="true" aria-describedby="help-password">
<p id="help-password" class="help-block">
{{$errors->first('password')}}</p>
</div>
</div>
<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ' has-success' }}">
<label for="password_confirmation" class="col-sm-4 control-label">Повторите пароль:</label>

 <div class="col-sm-8">
<input type="password" name="password_confirmation" class="form-control" required title="Повтор пароля">
<p class="help-block">{{$errors->first('password_confirmation')}}</p>
</div>
</div>
<div class="checkbox{{ $errors->has('rules') ? ' has-error' : ' has-success' }}">
<label for="rules" class="col-sm-4 control-label">Правила принимаю</label>
<div class="col-sm-8">
<input type="checkbox" name="rules" value="1" {{Input::old('rules')}} aria-describedby="help-rules" title="Правила принимаю">
<p id="help-rules" class="help-block">{{$errors->first('rules')}}</p>
</div>
</div>
<div class="form-group">
<div class="col-sm-8 col-sm-push-4">
<button value="Зарегистрироваться" class="btn btn-lg btn-primary btn-success" type="submit">
</div>
</div>
</form>
@stop