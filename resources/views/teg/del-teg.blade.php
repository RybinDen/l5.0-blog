@extends('layouts.app')
@section('title')
Удаление метки
@stop
@section('content')
<h2>Удаление метки</h2>
<form action="" method="POST" class="form-horizontal" role="form">
<input type="hidden" name="_token" value="{{$csrf_token}}">
@foreach($tegs as $teg)
<input type="checkbox" name="teg[]" value="{{$teg->id}}">{{$teg->name}}<br />
@endforeach
<input type="submit" value="Удалить">
</form>
@stop