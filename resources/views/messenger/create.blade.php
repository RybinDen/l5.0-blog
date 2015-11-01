@extends('layouts.master')

@section('title')
Создания сообщения
@stop
@section('content')
<h1>Создание нового сообщения</h1>
{{Form::open(['route' => 'messages.store'])}}
<div class="col-md-6">
    <!-- Subject Form Input -->
    
<div class="form-group">
        {{ Form::label('subject', 'Тема', ['class' => 'control-label']) }}
        {{ Form::text('subject', null, ['class' => 'form-control']) }}
    </div>

    <!-- Message Form Input -->
    <div class="form-group">
        {{ Form::label('message', 'Сообщение', ['class' => 'control-label']) }}
        {{ Form::textarea('message', null, ['class' => 'form-control']) }}
    </div>

    @if($users->count() > 0)
    <div class="checkbox">
        @foreach($users as $u)
            <label title="{{$u->first_name}} {{$u->last_name}}"><input type="checkbox" name="recipients[]" value="{{$u->id}}">{{$u->login}}</label>
        @endforeach
    </div>
    @endif
    
    <!-- Submit Form Input -->
    <div class="form-group">
        {{ Form::submit('Отправить', ['class' => 'btn btn-primary form-control']) }}
    </div>
</div>
{{Form::close()}}
@stop
