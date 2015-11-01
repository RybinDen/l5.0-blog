@extends('layouts.form')
@section('title')
переводчик
@stop
@section('content')
@if($error)
@foreach($error as $e)
<div>{{$e}}</div>
@endforeach
@endif
<div class="row">
<div class="small-12 columns">
{{$translation}}
</div></div>
<div class="row">
<div class="small-12 columns">
{{$source}}
</div></div>
{{Form::open(['role'=>'form'])}}
<label>Английский текст:
{{Form::textarea('text', null, ['placeholder'=>'английский текст'])}}
</label>
{{Form::submit('Перевести')}}
{{Form::close()}}
@stop