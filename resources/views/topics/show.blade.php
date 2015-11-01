@extends('layouts.app')
@section('title')
{{$topic->title}}
@stop
@section('meta_description')
{{$topic->description}}
@stop
@section('menu')
<li><a href="/teg/{{$topic->teg_id}}">{{$topic->teg->name}}</a></li>

@stop
@section('content')

@if (!$errors->isEmpty())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
<div class="page-header">
<h1 id="title-topic">{{$topic->title}}</h1>
</div>
<article role="article" aria-labelledby="title-topic">
{{$topic->description}}


<div class="row">
<div class="col-xs-12">
{!!$topic->content!!}
</div>
</div> <!--row-->
<div class="row">
<div class="col-xs-4">
<a href="/user/{{$topic->user_id}}">{{$topic->user->name}}</a>
</div>
<div class="col-xs-4">
<time> {{LocalizedCarbon::instance($topic->created_at)->diffForHumans()}} 
</time>
</div>
<div class="col-xs-4">
Просмотров: {{$topic->views}}

</div>
</div>
</article>
<h1>Поделиться</h1>
<script type="text/javascript" src="//yandex.st/share/share.js"
charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru"
 data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir" data-yashareTheme="counter"

></div> 


@if(isset($corentUser))
@if($corentUser->id == $topic->user_id)
<p>
<a href="/topic/edit/{{$topic->id}}" class="btn btn-primary" role="button">Изменить</a>
<a href="/topic/delete/{{$topic->id}}" class="btn btn-danger" role="button">Удалить</a>
</p>
@endif

<a href="#addComment">написать комментарий</a>
@endif


<h1>Комментарии {{$topic->comments->count()}}</h1>
@foreach($topic->comments as $comment)
<div class="row">
<div class="col-md-3">
<a href="/user/{{$comment->user->id}}">{{$comment->user->name}}</a> 
</div>
<div class="col-md-2">
{{LocalizedCarbon::instance($comment->created_at)->diffForHumans()}}
</div>
<div class="col-md-7">
{{{$comment->content}}}
</div>
</div>
@endforeach

@if(!empty($corentUser))
<h1 id="addComment">Добавить комментарий</h1>
<form method="post" action="/comment/save" class="form-horizontal" role="form" title="добавление комментария">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="topic" value="{{$topic->id}}">
<div class="form-group">
<label for="comment" class="col-md-4 control-label">Ваш комментарий</label>
 <div class="col-md-8">
<input type="textarea" name="comment" class="control-form" value="{{old('comment')}}" required title="Ваш комментарий">
</div></div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Сохранить">
</div>
</form>
@else
<p><strong>Для добавления  комментария необходимо войти в систему.</strong> </p>
@endif
@stop