@extends('layouts.app')
@section('title')
{{$titlePage}}
@stop
@section('content')
<h1>{{$titlePage}}</h1>
<div>
Всего статей: {{$topics->total()}}</div>

@foreach($topics as $topic)
<h2><a href="/topic/{{$topic->id}}">{{$topic->title}}</a></h2>
{!!Request::is('topics/user/'.$topic->user->id)?$topic->user->name:'<a href="/topics/user/'.$topic->user->id.'">'.$topic->user->name.'</a>'!!}<br>
{!!Request::is('topics/teg/'.$topic->teg->id)?$topic->teg->name:'<a href="/topics/teg/'.$topic->teg->id.'">'.$topic->teg->name.'</a>'!!}<br>
<datetime>{{LocalizedCarbon::instance($topic->created_at)->diffForHumans()}}</datetime><br />
@if($topic->created_at != $topic->updated_at)
Обновлена {{LocalizedCarbon::instance($topic->updated_at)->diffForHumans()}}<br>
@endif
Просмотров: {{$topic->views}}.<br>
 Комментариев: {{$topic->comments->count()}}
<p>{{$topic->description}}</p>
@if(isset($corentUser))
@if($topic->user_id == $corentUser->id)
<a href="/topic/edit/{{$topic->id}}">Изменить</a><br>
<a href="/topic/delete/{{$topic->id}}">Удалить</a><br />
@endif
@endif
@endforeach

{!!$topics->render()!!}
@stop