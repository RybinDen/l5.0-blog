@extends('layouts.app')
@section('title')
{{$update or 'Создание'}} метки
@stop
@section('content')
<h1>{{$update or 'Создание'}} метки</h1>
<form action="/teg/save" method="POST" class="form-horizontal" role="form">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="form-group">
<label for="name" class="control-label col-md-4">Наименование метки</label>
<div class="col-md-8">
<input type="text" name="name" value="{{old('name')}}" class="form-control" required>
@if($errors->has('name'))
<div class="has-error">
{{$errors->first('name')}}
</div>
@endif
</div></div>
<input type="submit" value="Сохранить">
</form>
@stop