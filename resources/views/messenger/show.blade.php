@extends('layouts.master')

@section('title')
{{$thread->subject}}
@stop
@section('content')
    <div class="col-md-6">
        <h1>{{$thread->subject}}</h1>

        @foreach($thread->messages as $message)
{{link_to('user/profile/'.$message->user_id, $message->user->login,['target'=>'_blank'])}}
<small>
{{LocalizedCarbon::instance($message->created_at)->diffForHumans()}}
</small>
<p>{{$message->body}}</p>
@endforeach

        <h2>Написать новое сообщение</h2>
        {{Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT'])}}
        <!-- Message Form Input -->
        <div class="form-group">
            {{ Form::textarea('message', null, ['class' => 'form-control']) }}
        </div>
        <!-- Submit Form Input -->
        <div class="form-group">
            {{ Form::submit('Отправить', ['class' => 'btn btn-primary form-control']) }}
        </div>
        {{Form::close()}}
    </div>
@stop