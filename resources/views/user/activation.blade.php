@extends('layouts.app')
@section('title')
 Активация профиля
@stop

@section('content')
    <p>Активация профиля</p>
<form action ="" method="POST" class="form-horizontal" role="form">
<div class="form-group">
<label for="code" class="col-md-4 control-label">Код активации приссанный вам на e-mail</label>

<div class="com-sm-8">
<input type="text" name="code" value="{{old('code')}}" class="form-control" required autofocus">
</div></div>
<div class="form-group">
<label for="email" class="col-md-4 control-label">Ваш email</label>
<div class="col-sm-8">
<input type="email" name="email" value="{{old('email')}}" class="form-control" required>
</div></div>

<div class="form-group">
<div class="col-sm-8 col-sm-push-4">
<buttonclass=btn btn-lg btn-primary btn-success" type="submit">Активировать</button>
</div> </div>
</form>
<p>Если у вас нет кода активации, то его можно получить на свой email по ссылке, указанной ниже.</p>

{{HTML::link('activation/code', 'получить код активации')}}
@stop
