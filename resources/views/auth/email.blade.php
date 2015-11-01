@extends('layouts.app')
@section('title')
запрос кода активации
@stop
@section('content')
<div class="page-header">
<h1>Запрос кода активации</h1>
</div>

<form action="" method="POST" class=form-horizontal" role="form">
<div class="form-group">
<label for="email" class="col-sm-4 control-label">
<div class="col-sm-8">
<input type="email" name="email" value="{{old('email')}}" class="form-control" required autofocus>
</div></div>
<div class="form-group">
<div class="col-sm-8 col-sm-push-4">
<button class="btn  btn-primary" type="submit">Прислать код активации</button>

</div> </div>
</form>

@stop