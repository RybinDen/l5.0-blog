@extends('layouts.app')
@section('title')
{{$titlePage}}
@stop
@section('menu')
<li>{!!Request::is('teg')?'Метки':'<a href="/teg">Метки</a>'!!}</li>
<li>{!!Request::is('questions/status1')?'Решенные вопросы':'<a href="/questions/status1">Решенные вопросы</a>'!!}</li>
<li>{!!Request::is('questions/status0')?'Актуальные':'<a href="/questions/status0">Актуальные</a>'!!}</li>
<li>{!!Request::is('questions/answer1')?'С ответами':'<a href="/questions/answer1">С ответами</a>'!!}</li>
<li>{!!Request::is('questions/answer0')?'Без ответа':'<a href="/questions/answer0">Без ответа</a>'!!}</li>
@stop
@section('content')
<h1>{{$titlePage}}</h1>
Всего {{$questions->total()}} вопросов.<br />

@foreach($questions as $question)
<div class="row">
<div class="col-md-12">
<h2><a href="/question/{{$question->id}}">{{$question->title}}</a></h2>
{!!Request::is('questions/user/'.$question->user->id)?$question->user->name:'<a href="/questions/user/'.$question->user->id.'">'.$question->user->name.'</a>'!!}<br />
Задан <small>{{LocalizedCarbon::instance($question->created_at)->diffForHumans()}}</small>

@if($question->created_at != $question->updated_at)
Обновлен: <small>
{{LocalizedCarbon::instance($question->updated_at)->diffForHumans()}}
</small>
@endif
<p>Метки:<br />
@foreach($question->tegs as $teg)
{!!Request::is('questions/teg/'.$teg->id)?$teg->name:'<a href="/questions/teg/'.$teg->id.'"><small>'.$teg->name.'</small></a>'!!}
<br />
@endforeach
</p>
<p>
Просмотров: {{$question->views}}.<br/>
Подписчиков: {{$question->subscribers->count()}}<br />
@if($question->answers->count() == 0)
Ответов нет<br />
@else
Ответов: {{$question->answers->count()}}</br />
Решений: {{App\Models\Answer::where('question_id','=',$question->id)->where('status','=','1')->count()}}
@endif
Статус: 
@if($question->status == 0)
актуальный 
@else
решен
@endif
</p>
</div></div>
@endforeach
{{$questions->render()}}

@stop