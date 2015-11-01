@extends('layouts.app')
@section('title')
Метки
@stop
@section('content')
<h1>Метки</h1>
@foreach($tegs as $teg)
<h2><a href="/teg/{{$teg->id}}">{{$teg->name}}</a></h2>
@if(count($teg->questions) >= 1)
<a href="/questions/teg/{{$teg->id}}">Вопросов {{count($teg->questions)}}</a> <br />
@else
Вопросов нет<br />
@endif
@if($teg->topics->count() >= 1)
<a href="/topics/teg/{{$teg->id}}">Статей {{$teg->topics->count()}}</a></br>
@else
Статей нет<br />
@endif
@endforeach

{!!$tegs->render()!!}
@stop