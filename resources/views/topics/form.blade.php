@extends('layouts.app')
@section('title')
{!!$update or 'Создание'!!} статьи
@stop
@section('content')
<h1>{{$update or 'Создание'}} статьи</h1>
<p><i>Метка: {{$teg->name}}</i></p>

<form action="/topic/save" method="POST" class="form-horizontal" role="form">
<input type="hidden" name="teg" value="{{$teg->id}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@if(isset($update))
<input type="hidden" name="update" value="{{$topic->id}}">

@endif
<div class="form-group">
<label for="title" class="col-md-4 control-label">Заголовок статьи:</label>
<div class="col-md-8">
<input type="text" name="title" value="{{$topic->title or old('title')}}" class="form-control" required autofocus title="Заголовок статьи">
</div>
</div>
<div class="form-group">
<label for="description" class="col-md-4 control-label">Краткое описание:</label>
<div class="col-md-8">
<input type="text" name="description" value="{{$topic->description or old('description')}}" class="form-control" required title="Краткое описание">
</div></div>

<div class="form-group">
<label for="content" class="col-md-4 control-label">Текст статьи</label>
<div class="col-md-8">
<textarea name="content" class="form-control" required placeholder="Полный текст статьи">
{{$topic->content or old('content')}}
</textarea>
</div></div>

<input class="btn btn-lg btn-primary" type="submit" value="{{$update or 'Сохранить'}}">
</form>

@stop