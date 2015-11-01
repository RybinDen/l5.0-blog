@extends('layouts.master')
@section('title')
admin tools, comments
@stop
@section('content')
<h1>Список комментариев</h1>
<ul>
@foreach($comments as $comment)
<li>{{$comment->content}}- {{HTML::link('admin/comment-del/'.$comment->id, 'удалить')}}</li>
@endforeach
</ul>
@stop