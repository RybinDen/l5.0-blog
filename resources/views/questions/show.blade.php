@extends('layouts.app')
@section('title')
{{$question->title}}
@stop
@section('content')
<h1>{{$question->title}}</h1>
<table class="table">
<tr><th>Автор</th><td>{{$question->user->name}}</td></tr>
<tr><th>Задан</th><td>{{LocalizedCarbon::instance($question->created_at)->diffForHumans()}}</td></tr>
<tr><th>Обновлен</th><td>{{LocalizedCarbon::instance($question->updated_at)->diffForHumans()}}</td></tr>
<tr><th>Просмотров:</th><td>{{$question->views}}.</td></tr>
<tr><th>Статус</th><td>
@if($question->status ==1)
Решен
@else
Актуальный
@endif
</td></tr>
<tr><th>Ответов: </th><td>{{$question->answers->count()}}.</td></tr>
<tr><th>решений</th><td>{{$question->answers->where('status',1)->count()}}</td></tr>
<tr><th>Подписчиков</th><td>{{$question->subscribers->count()}}</td></tr>
<tr><th>Метки:</th><td>
@foreach($question->tegs as $teg)
<a href="/teg/{{$teg->id}}">{{$teg->name}}</a><br>
@endforeach
</td></tr>
</table>

<article role="main" title="описание вопроса"> 
<p>{{$question->description}}</p>
</article>

@if(count($question->answers) != 0)
<h2>Ответы</h2>
@foreach($answers as $ans)
<p>
{{$ans->user->name}}<br>
<small>{{LocalizedCarbon::instance($ans->created_at)->diffForHumans()}}</small>
<div>{{$ans->description}}</div>
@if($ans->status == 1)
<b>Решение</b>
@else

@if(isset($corentUser))
@if($question->user->id == $corentUser->id)
<a href="/answer/status/{{$ans->id}}">Пометить как решение</a>
@endif
@if($ans->user_id == $corentUser->id)
<a href="/answer/edit/{{$ans->id}}">Редактировать ответ</a>
<a href="/answer/delete/{{$ans->id}}">Удалить</a>
@endif
@endif
@endif
</p>
@endforeach

@endif


@if(empty($corentUser) )
<p><i>Чтобы ответить на вопрос войдите в систему.</i></p>
@else
{!!$s?'':'<a href="/question/subscribe/'.$question->id.'">подписаться</a>'!!}
<h2>Ответить на вопрос</h2>
<form action="/answer/save" method="POST" class="form-horizontal" role="form" title="ответить на вопрос">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="question" value="{{$question->id}}">
<input type="hidden" name="update" value="@if(Session::has('answerUpdate'))
{{Session::get('answerUpdate')->id}}
@endif
">
 
<div class="form-group">
<label for="description" class="control-label col-md-4">Ваш ответ</label>
<div class="col-md-8">
<textarea name="description" class="form-control" placeholder="Ваш ответ" accesskey="c" required> 
@if(Session::has('answerUpdate'))
{{Session::get('answerUpdate')->description}}
@else
{{old('description')}}
@endif
</textarea>
</div></div>
<input type="submit" value="Отправить" class="btn btn-primary">
</form>
@if($question->user->id == $corentUser->id)
@if($question->status != 1)
<h2>Управление вопросом</h2>
<a href="/question/update/{{$question->id}}" class="btn btn-primary" role="button">Обновить</a>
<a href="/question/delete/{{$question->id}}" class="btn btn-danger" role="button">Удалить</a>
@endif
@endif
@endif

@stop