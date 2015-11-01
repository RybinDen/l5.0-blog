@extends('layouts.app')
@section('title')
{{$teg->name}}
@stop
@section('content')
<div class="page-header">
<h1 id="title-teg">{{$teg->name}}</h1>
</div>
<h2>Статьи</h2>
<p>Всего статей: {{count($teg->topics)}}</p>
@foreach($teg->topics as $topic)
<a href="/topic/{{$topic->id}}">{{$topic->title}}</a><br>
@endforeach
<h2>Вопросы</h2>
<p>Всего вопросов: {{count($teg->questions)}}</p>
@foreach($teg->questions as $question)
<a href="/question/{{$question->id}}">{{$question->title}}</a><br>
@endforeach

@stop