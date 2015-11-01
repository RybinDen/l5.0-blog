@extends('layouts.app')

@section('menu')
<li>{!!Request::is('about')? 'О сайте' : '<a href="/about">О сайте</a>'!!}</li>
<li>{!!Request::is('contacts')? 'Контакты' : '<a href="/contacts">Контакты</a>'!!}</li>
@stop
@section('content')
<div class="row">
<div class="col-md-6">
<h1>Новые статьи</h1>
@foreach($topics as $topic)
<h2>{{$topic->title}}</h2>
<small>
<a href="teg/{{$topic->teg->id}}">{{$topic->teg->name}}</a>
</small>
<p>{{$topic->description}}
</p>
{!!Str_limit($topic->content, 140)!!} 
<a href="topic/{{$topic->id}}"> Далее</a>

@endforeach
</div>

<div class="col-md-6">
<h1>Новые вопросы</h1>
@foreach($questions as $question)
<h2><a href="/question/{{$question->id}}">{{$question->title}}</a></h2>
{{$question->user->name}}<br />

Задан: <small>
{{ LocalizedCarbon::instance($question->created_at)->diffForHumans()}}
</small>
<p>Метки:<br />
@foreach($question->tegs as $teg)
<small>{{$teg->name}}</small><br />
@endforeach
</p>
<p>
@if($question->answers->count() == 0)
Без ответа<br />
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
@endforeach
</div>
</div><!--/row-->


@endsection