@extends('layouts.app')
@section('title')
Загрузка файла
@stop
@section('content')
<h1>Загрузка файла на сайт</h1>
     <div class="span7 offset1">
        @if(Session::has('success'))
          <div class="alert-box success">
          <h2>{{ Session::get('success') }}</h2>
          </div>
        @endif

<form method="POST" action="/user/upload"
accept-charset="UTF-8" enctype="multipart/form-data" role="form" title="загрузка файла">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="control-group">
          <div class="controls">
          <input name="image" type="file">
	  <p class="errors">{{$errors->first('image')}}</p>
	@if(Session::has('error'))
	<p class="errors">{{ Session::get('error') }}</p>
	@endif
        </div>
        </div>
        <div id="success"> </div>
      <input type="submit" value="Загрузить" class="send-btn">
      </form>
@stop