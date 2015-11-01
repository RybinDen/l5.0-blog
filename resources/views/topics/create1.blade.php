@extends('layouts.app')
@section('title')
Выбор метки
@stop
@section('content')
<h1>Выбор метки</h1>
<form action="/topic/create" method="POST" class="form-horizontal" role="form" role="form" title="выбор категории">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
<select name="teg">
@foreach($tegs as $teg)
<option value="{{$teg->id}}">{{$teg->name}}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="new_teg" class="col-md-4 control-label">Новая метка (если нет подходящей в списке выше)</label>
<div class="col-md-8">
<input type="text" name="new_teg" class="form-control" title="Название метки">
</div></div>
<p><i>Оставьте это поле пустым, если в списке есть нужная метка</i></p>
<div class="form-group">
<input class="btn btn-primary" type="submit" value="Далее">
</div>
</form>
@stop