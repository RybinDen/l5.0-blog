@extends('layouts.master')
@section('title')
диалог с пользователем
@stop
@section('content')
@foreach($conversations->messages as $m)
<div>
{{$m->participant->login}}
</div>
<div>
{{$m->text}}
</div>
@endforeach
{{isset($m)?null:'Сообщений нет'}}
<div>
@foreach($conversations->participants as $p)
{{$p->participant->login}} 
@endforeach
</div>

{{Form::open(['role'=>'form'])}}
{{Form::textarea('text',null, ['placeholder'=>'текст сообщения'])}}
{{Form::submit('отправить')}}
@stop
