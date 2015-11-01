@extends('layouts.app')
@section('title')
{{$titlePage}}
@stop
@section('content')
<h1>{{$titlePage}}</h1>
@foreach($questions as $q)
<? $count = $q->answers()->where('user_id','=',$id)->count()?>
@if($count != 0)
<a href="/question/{{$q->id}}">{{$q->title.' '.$count}}</a>
@endif
<br />
@endforeach
@stop