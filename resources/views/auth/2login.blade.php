@extends('layouts.master')
@section('title')
Вход на сайт
@stop
@section('content')
<div class="page-header">
<h2>Вход на сайт</h2>
</div>
<form class="form-horizontal" autocomplete="off">
<div class="form-group {{Session::has('errors') ? 'has-error has-feedback' :'has-success has-feedback'}}">
<label for="email" class="col-sm-4 control-label">Ваш E-mail:</label>
<div class="col-sm-8">
<input type="email" name="email" value="{{Input::old('email')}}" class="form-control" required aria-required="true" aria-describeby="help-email" autofocus>
    <p id="help-email" class="help-block">
{{ $errors->first('email') }}</p>
</div>
</div>
<div class="form-group {{Session::has('errors') ? 'has-error has-feedback' :'has-success has-feedback'}}">
<label for="password" class="col-sm-4 control-label">Ваш пароль:</label>
<div class="col-sm-8">
<input type="password" name="password" class="form-control" required aria-required="true" aria-describedby="help-password">
<p id="help-password" class="help-block">{{ $errors->first('password') }}</p>
</div>
</div>
<div class="form-group has-success">
<div class="checkbox">
<label>Запомнить меня
<input type="checkbox" name="remember-me" value="1"</label>
</label>
</div></div>
<div class="form-group has-success">
<div class="col-sm-8 col-sm-push-4">
<button value="Войти" class="btn btn-primary btn-lg" type="submit">
</div>
</div>
</form>
<div class="row">
<div class="col-sm-6">
<a class="btn btn-lg btn-success" href="{{ URL::to('password/email') }}" role="button">Забыли пароль?</a>
</div>
<div class="col-sm-6">
<a class="btn btn-lg btn-success" href="{{URL::to('auth/register')}}" role="button">Регистрация</a>
</div></div>


@stop