@extends('layouts.app')
@section('title')
Пользователи
@stop
@section('content')
<h1>Пользователи</h1>
<p>Всего {{$users->total()}} пользователей.</p> 
@foreach($users as $u)
<? $countT = $u->topics->count();
$countC = $u->comments->count();
$countq = $u->questions()->count();
$counta = $u->answers()->count();
$countq1 = $u->questions()->where('status','=','1')->count();
$counta1 = $u->answers()->where('status','=','1')->count()?>
<h2><a href="/user/{{$u->id}}">{{$u->name}}</a></h2>
 @if($countq != 0)
<a href="/questions/user/{{$u->id}}">Всего вопросов: {{$countq}}</a><br />
@endif
@if($countq1 != 0)
<a href="/questions/user-q1/{{$u->id}}">Решенные вопросы: {{$countq1}}</a><br />
@endif
@if($counta != 0)
<a href="/questions/user-ans/{{$u->id}}">Всего ответов: {{$counta}}</a><br />
@endif
@if($countT != 0)
<a href="topics/user/{{$u->id}}">статьи {{$countT}}</a><br />
@endif
@if($countC != 0)
<a href="/topics/user-com/{{$u->id}}">комментариев к статьям {{$countC}}</a><br />
@endif
@endforeach
{!!$users->render()!!}
@stop