@extends('layouts.app')
@section('title')
Вопросы, на которые дал полезные ответы
@stop
@section('content')
<h1>Вопросы, на которые дал пользователь полезные ответы</h1>
@foreach($questions as $q)
<? $count = $q->answers()->where('user_id','=',$id)->where('status','=','1')->count()?>
@if($count != 0)
<a href="/question/{{$q->id}}">{{$q->title. ' '.$count}}</a>
@endif
@endforeach

@stop